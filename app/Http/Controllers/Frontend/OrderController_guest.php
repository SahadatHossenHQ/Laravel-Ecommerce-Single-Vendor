<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\DownloadProduct;
use App\Models\DownloadUserProduct;
use App\Models\Order;
use App\Models\CartInfo;
use App\Models\PartialPayment;
use App\Models\Product;
use App\Models\Review;
use App\Models\Attribute;
use App\Models\User;
use App\Models\VendorAccount;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Library\UddoktaPay;
use ZipArchive;
use Carbon\Carbon;
use DB;
class OrderController_guest extends Controller
{       
    /**
     * customer order show
     *
     * @return void
     */
    // public function order()
    // {
    //     $orders = Order::where('user_id', auth()->id())->latest('id')->get();
    //     return view('frontend.order', compact('orders'));
    // }




    /**
     * store Guest order
     *
     * @param  mixed $request
     * @return void
     */
    public function orderStore_guest(Request $request)
    {
        $this->validate($request, [
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'nullable|string|max:255',
            'company'         => 'nullable|string|max:255',
            'country'         => 'required|string|max:255',
            'address'         => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'district'        => 'required|string|max:255',
            'postcode'        => 'nullable|string|max:255',
            'phone'           => 'required|string|max:11|min:11',
            'email'           => 'nullable|email|string|max:255',
            'shipping_method' => 'nullable|string|max:255',
            'payment_method'  => 'required|string|max:255',
            'mobile_number'   => 'nullable|string|max:255',
            'transaction_id'  => 'nullable|string|max:255',
            'bank_name'       => 'nullable|string|max:255',
            'account_number'  => 'nullable|string|max:255',
            'holder_name'     => 'nullable|string|max:255',
            'branch'          => 'nullable|string|max:255',
            'routing'         => 'nullable|string|max:255',
        ]);


        $seller_count = $request->seller_count;
        if ($request->city == 'Dhaka') {
            $shipping_charge = setting('shipping_charge') * $seller_count;
            $single_charge = setting('shipping_charge');
        } else {
            $shipping_charge = setting('shipping_charge_out_of_range') * $seller_count;
            $single_charge = setting('shipping_charge_out_of_range');
        }

        $cart_subtotal = $request->stotal;
        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['name'];
            $discount    = Session::get('coupon')['discount'];
            $total       = ($cart_subtotal + $shipping_charge) - $discount;
        }

        if (Session::has('coupon')) {
            $wl = $total;
        } else {
            $wl = $cart_subtotal + $shipping_charge;
        }

        /* if ($request->payment_method == 'wallate') {
            if ($wl > auth()->user()->wallate) {
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            } else {
                $user = User::find(auth()->id());
                $user->wallate = $user->wallate - $wl;
                $user->update();
            }
        } */

        /* if ($request->partial_paid > 0) {
            if ($request->partial_paid > auth()->user()->wallate) {
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            } else {
                $user = User::find(auth()->id());
                $user->wallate = $user->wallate - $request->partial_paid;
                $user->update();
            }
        } */


        $order = Order::create([
            // 'user_id'         => auth()->id(),
            // 'refer_id'     => auth()->user()->refer,
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'company_name'    => $request->company,
            'country'         => $request->country,
            'address'         => $request->address,
            'town'            => $request->city,
            'district'        => $request->district,
            'thana'           => $request->thana,
            'post_code'       => $request->postcode,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'shipping_method' => $request->shipping_method,
            'shipping_charge' => $shipping_charge,
            'single_charge'   => $single_charge,
            'payment_method'  => $request->payment_method,
            'mobile_number'   => $request->mobile_number,
            'transaction_id'  => $request->transaction_id,
            'bank_name'       => $request->bank_name,
            'account_number'  => $request->account_number,
            'holder_name'     => $request->holder_name,
            'branch_name'     => $request->branch,
            'routing_number'  => $request->routing,
            'coupon_code'     => $coupon_code ?? '',
            'subtotal'        => $subtotal ?? $cart_subtotal,
            'discount'        => $discount ?? 0,
            'is_pre'          => $request->pr ?? 0,
            'total'           => $total ?? $cart_subtotal + $shipping_charge,
            'cart_type'       => 1,
        ]);

        $chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle($chars), 0, 10);

        $order->update([
            'order_id' => $order_id,
            'invoice'  => '#' . str_pad($order->id, 5, 0, STR_PAD_LEFT),
        ]);


        $total_refer = 0;
        $usids = [];
        foreach (Cart::content() as $item) {
            $pp = Product::find($item->id);
            if (!in_array("$pp->user_id", $usids)) {
                $usids[] = $pp->user_id;
            }

            $total_refer += (($item->price / 100) * $item->qty);
            if ($item->qty >= 6 && $pp->whole_price > 0) {
                $price = $pp->whole_price;
            } else {
                $price = $item->price;
            }
            $vendor = User::find($pp->user_id);
            $vp = $price * $item->qty;
            if ($vendor->role_id == 1) {
                $gt = $vp;
            } else {
                if ($vendor->shop_info->commission == NULL) {
                    $commission  = (setting('shop_commission') / 100) * $vp;
                    $gt = $vp - $commission;
                } else {
                    $commission  = ($vendor->shop_info->commission / 100) * $vp;
                    $gt = $vp - $commission;
                }
            }
            $order->orderDetails()->create([
                'product_id'  => $item->id,
                'seller_id'     => $pp->user_id,
                'title'       => $item->name,
                'color'       => $item->options->color,
                'size'        => json_encode($item->options->attributes),
                'qty'         => $item->qty,
                'price'       => $price,
                'total_price' => $price * $item->qty,
                'g_total' => $gt
            ]);

            $product = Product::find($item->id);
            $userPoint = User::find(auth()->id());
            $pointp = $product->point * $item->qty;
            if (setting('is_point') == 1) {
                $point = $pointp;
            } else {
                $point = 0;
            }
            $userPoint->pen_point += $point;

            $userPoint->update();
            $order->point += $point;
            $order->save();
            if ($product) {
                $vendor = User::find($product->user_id);
                if ($vendor->role_id == 1) {
                    $account = VendorAccount::where('vendor_id', 1)->first();
                    $account->pending_amount += $vp;
                    $account->save();
                } else {

                    $grand_total = $price * $item->qty;

                    if ($vendor->shop_info->commission == NULL) {
                        $commission  = (setting('shop_commission') / 100) * $grand_total;
                        $amount = $grand_total - $commission;
                    } else {
                        $commission  = ($vendor->shop_info->commission / 100) * $grand_total;
                        $amount = $grand_total - $commission;
                    }
                    $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                    $adminAccount->update([
                        'pending_amount' => $adminAccount->pending_amount + $commission
                    ]);

                    $vendor->vendorAccount()->update([
                        'pending_amount' => $vendor->vendorAccount->pending_amount + $amount
                    ]);

                    $check = Commission::where('user_id', $product->user_id)->where('order_id', $order->id)->first();
                    if (!$check) {
                        Commission::create([
                            'user_id'  => $product->user_id,
                            'order_id' => $order->id,
                            'amount'   => $commission,
                            'status' => '0',
                        ]);
                    } else {
                        $check->amount = $check->amount + $commission;
                        $check->update();
                    }
                }
                $product->quantity = $product->quantity - $item->qty;
                $product->save();
            }
        }

        // foreach ($usids as $seller) {
        //     $total = DB::table('order_details')->where('seller_id', $seller)->where('order_id', $order->id)->sum('total_price');
        //     $total += $single_charge;
        //     DB::table('multi_order')->insert(
        //         ['vendor_id' => $seller, 'order_id' => $order->id, 'partial_pay' => 0, 'status' => 0, 'total' => $total]
        //     );
        // }
        // if ($request->payment_method == 'wallate') {
        //     $order->update([
        //         'pay_staus' => 1,
        //         'pay_date'  => date('d-m-y'),
        //     ]);
        // }
        // if ($request->partial_paid < auth()->user()->wallate && $request->partial_paid > 0) {
        //     $parts = DB::table('multi_order')->where('order_id', $order->id)->get();
        //     $amount = $request->partial_paid;
        //     foreach ($parts as $part) {
        //         if ($amount > 0) {
        //             if ($part->partial_pay != $part->total) {
        //                 $total_requested = $part->partial_pay + $amount;

        //                 if ($total_requested > $part->total) {
        //                     $new_balance = $total_requested - $part->total;
        //                     $slice = $amount - $new_balance;
        //                     $amount -= $slice;
        //                 } else {
        //                     $slice = $amount;
        //                     $amount -= $slice;
        //                 }

        //                 DB::table('multi_order')->where('id', $part->id)->update(['partial_pay' => $part->partial_pay + $slice]);
        //             }
        //         }
        //     }
        //     PartialPayment::create([
        //         'order_id' => $order->id,
        //         'payment_method' => 'wall',
        //         'amount' => $request->partial_paid,
        //         'status' => 1,
        //     ]);
        // }

        if (Session::has('coupon')) {
            $n_parts = DB::table('multi_order')->where('order_id', $order->id)->get();
            $n_amount = $discount;
            foreach ($n_parts as $n_part) {
                if ($n_amount > 0) {
                    if ($n_part->partial_pay != $n_part->total) {
                        $n_total_requested = $n_part->discount + $n_amount;

                        if ($n_total_requested > $n_part->total) {
                            $n_new_balance = $n_total_requested - $n_part->total;
                            $n_slice = $n_amount - $n_new_balance;
                            $n_amount -= $n_slice;
                        } else {
                            $n_slice = $n_amount;
                            $n_amount -= $n_slice;
                        }

                        DB::table('multi_order')->where('id', $n_part->id)->update(['discount' => $n_part->partial_pay + $n_slice]);
                    }
                }
            }
        }
        Cart::destroy();
        Session::forget('coupon');
        $order->update(['refer_bonus' => $total_refer]);
        $data = [
            'order_id'        => $order->order_id,
            'invoice'         => $order->invoice,
            'name'            => $request->first_name,
            'email'           => $request->email,
            'address'         => $request->address,
            'coupon_code'     => $order->coupon_code,
            'subtotal'        => $order->subtotal,
            'shipping_charge' => $order->shipping_charge,
            'discount'        => $order->discount,
            'total'           => $order->total,
            'date'            => $order->created_at,
            'payment_method'            => $order->payment_method,
            'pay_status'            => $order->pay_staus,
            'pay_date'            => $order->pay_date,
            'orderDetails'    => $order->orderDetails,
            'phone'           => $request->phone,
        ];
        
        
        // $cart = CartInfo::where('user_id', auth()->id())->delete();





        if ($request->payment_method == 'aamarpay') {
            $amn = $total ?? $cart_subtotal + $shipping_charge;
            $this->paynow($request, $amn, $order->id);
        } elseif ($request->payment_method == 'uddoktapay') {
            $amn = $total ?? $cart_subtotal + $shipping_charge;
            $url = $this->uddokpay($request, $amn, $order->id);
            if ($url) {
                return Redirect::to($url);
            }
        } else {
            if (setting('mail_config') == 1) {
                Mail::send('frontend.invoice-mail', $data, function ($mail) use ($data) {
                    $mail->from(config('mail.from.address'),  config('app.name'))
                        ->to($data['email'], $data['name'])
                        ->subject('Order Invoice');
                });
            }

            // notify()->success("Your order successfully done", "Congratulations");
            // return redirect()->route('order');

            echo 'Order Success';
        }
    }



}