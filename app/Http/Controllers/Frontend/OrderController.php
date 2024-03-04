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
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{       
    /**
     * customer order show
     *
     * @return void
     */
    public function order()
    {
        $orders = Order::where('user_id', auth()->id())->latest('id')->get();
        return view('frontend.order', compact('orders'));
    }


    public function returns()
    {
        $orders = Order::where('user_id', auth()->id())
            ->whereIn('status', [6, 7, 8])
            ->latest('id')
            ->get();
        return view('frontend.returns_order', compact('orders'));
    }
    



        /**
     * store Guest order
     *
     * @param  mixed $request
     * @return void
     */
    public function orderStore_minimal(Request $request)
    {
        $this->validate($request, [
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'nullable|string|max:255',
            'company'         => 'nullable|string|max:255',
            'country'         => 'nullable|string|max:255',
            'address'         => 'required|string|max:255',
            'city'            => 'nullable|string|max:255',
            'shipping_range'  => 'required|integer|max:255',
            'district'        => 'nullable|string|max:255',
            'postcode'        => 'nullable|string|max:255',
            'phone'           => 'required|string|max:11|min:11',
            'email'           => 'nullable|email|string|max:255',
            'shipping_method' => 'nullable|string|max:255',
            'payment_method'  => 'nullable|string|max:255',
            'mobile_number'   => 'nullable|string|max:255',
            'transaction_id'  => 'nullable|string|max:255',
            'bank_name'       => 'nullable|string|max:255',
            'account_number'  => 'nullable|string|max:255',
            'holder_name'     => 'nullable|string|max:255',
            'branch'          => 'nullable|string|max:255',
            'routing'         => 'nullable|string|max:255',
        ]);

        

        $seller_count = $request->seller_count;
        if($request->stotal > setting('shipping_free_above')){
            $shipping_charge = 0;
            $single_charge = 0;
        } else{
            if ($request->shipping_range == 1) {
                $shipping_charge = setting('shipping_charge') * $seller_count;
                $single_charge = setting('shipping_charge');
            } else {
                $shipping_charge = setting('shipping_charge_out_of_range') * $seller_count;
                $single_charge = setting('shipping_charge_out_of_range');
            }
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
        // $usids = [];
        // foreach (Cart::content() as $item) {
        //     $pp = Product::find($item->id);
        //     if (!in_array("$pp->user_id", $usids)) {
        //         $usids[] = $pp->user_id;
        //     }

        //     $total_refer += (($item->price / 100) * $item->qty);
        //     if ($item->qty >= 6 && $pp->whole_price > 0) {
        //         $price = $pp->whole_price;
        //     } else {
        //         $price = $item->price;
        //     }
        //     $vendor = User::find($pp->user_id);
        //     $vp = $price * $item->qty;
        //     if ($vendor->role_id == 1) {
        //         $gt = $vp;
        //     } else {
        //         if ($vendor->shop_info->commission == NULL) {
        //             $commission  = (setting('shop_commission') / 100) * $vp;
        //             $gt = $vp - $commission;
        //         } else {
        //             $commission  = ($vendor->shop_info->commission / 100) * $vp;
        //             $gt = $vp - $commission;
        //         }
        //     }
        //     $order->orderDetails()->create([
        //         'product_id'  => $item->id,
        //         'seller_id'     => $pp->user_id,
        //         'title'       => $item->name,
        //         'color'       => $item->options->color,
        //         'size'        => json_encode($item->options->attributes),
        //         'qty'         => $item->qty,
        //         'price'       => $price,
        //         'total_price' => $price * $item->qty,
        //         'g_total' => $gt
        //     ]);

        //     $product = Product::find($item->id);
        //     // $userPoint = User::find(auth()->id());
        //     // $pointp = $product->point * $item->qty;
        //     // if (setting('is_point') == 1) {
        //     //     $point = $pointp;
        //     // } else {
        //     //     $point = 0;
        //     // }
        //     // $userPoint->pen_point += $point;

        //     // $userPoint->update();
        //     // $order->point += $point;
        //     $order->save();
        //     echo 'Order Saved';
        //     // if ($product) {
        //     //     $vendor = User::find($product->user_id);
        //     //     if ($vendor->role_id == 1) {
        //     //         $account = VendorAccount::where('vendor_id', 1)->first();
        //     //         $account->pending_amount += $vp;
        //     //         $account->save();
        //     //     } else {

        //     //         $grand_total = $price * $item->qty;

        //     //         if ($vendor->shop_info->commission == NULL) {
        //     //             $commission  = (setting('shop_commission') / 100) * $grand_total;
        //     //             $amount = $grand_total - $commission;
        //     //         } else {
        //     //             $commission  = ($vendor->shop_info->commission / 100) * $grand_total;
        //     //             $amount = $grand_total - $commission;
        //     //         }
        //     //         $adminAccount = VendorAccount::where('vendor_id', 1)->first();
        //     //         $adminAccount->update([
        //     //             'pending_amount' => $adminAccount->pending_amount + $commission
        //     //         ]);

        //     //         $vendor->vendorAccount()->update([
        //     //             'pending_amount' => $vendor->vendorAccount->pending_amount + $amount
        //     //         ]);

        //     //         $check = Commission::where('user_id', $product->user_id)->where('order_id', $order->id)->first();
        //     //         if (!$check) {
        //     //             Commission::create([
        //     //                 'user_id'  => $product->user_id,
        //     //                 'order_id' => $order->id,
        //     //                 'amount'   => $commission,
        //     //                 'status' => '0',
        //     //             ]);
        //     //         } else {
        //     //             $check->amount = $check->amount + $commission;
        //     //             $check->update();
        //     //         }
        //     //     }
        //     //     $product->quantity = $product->quantity - $item->qty;
        //     //     $product->save();
        //     // }
        // }

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

            echo 'Thanks for your order, your invoice number is: ' . $data['invoice'] . ' <b><a href="/">Back to home</a></b>';

            
        }
    }





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
        if($request->stotal > setting('shipping_free_above')){
            $shipping_charge = 0;
            $single_charge = 0;
        } else{
            if ($request->city == 'Dhaka') {
                $shipping_charge = setting('shipping_charge') * $seller_count;
                $single_charge = setting('shipping_charge');
            } else {
                $shipping_charge = setting('shipping_charge_out_of_range') * $seller_count;
                $single_charge = setting('shipping_charge_out_of_range');
            }
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
        // $usids = [];
        // foreach (Cart::content() as $item) {
        //     $pp = Product::find($item->id);
        //     if (!in_array("$pp->user_id", $usids)) {
        //         $usids[] = $pp->user_id;
        //     }

        //     $total_refer += (($item->price / 100) * $item->qty);
        //     if ($item->qty >= 6 && $pp->whole_price > 0) {
        //         $price = $pp->whole_price;
        //     } else {
        //         $price = $item->price;
        //     }
        //     $vendor = User::find($pp->user_id);
        //     $vp = $price * $item->qty;
        //     if ($vendor->role_id == 1) {
        //         $gt = $vp;
        //     } else {
        //         if ($vendor->shop_info->commission == NULL) {
        //             $commission  = (setting('shop_commission') / 100) * $vp;
        //             $gt = $vp - $commission;
        //         } else {
        //             $commission  = ($vendor->shop_info->commission / 100) * $vp;
        //             $gt = $vp - $commission;
        //         }
        //     }
        //     $order->orderDetails()->create([
        //         'product_id'  => $item->id,
        //         'seller_id'     => $pp->user_id,
        //         'title'       => $item->name,
        //         'color'       => $item->options->color,
        //         'size'        => json_encode($item->options->attributes),
        //         'qty'         => $item->qty,
        //         'price'       => $price,
        //         'total_price' => $price * $item->qty,
        //         'g_total' => $gt
        //     ]);

        //     $product = Product::find($item->id);
        //     // $userPoint = User::find(auth()->id());
        //     // $pointp = $product->point * $item->qty;
        //     // if (setting('is_point') == 1) {
        //     //     $point = $pointp;
        //     // } else {
        //     //     $point = 0;
        //     // }
        //     // $userPoint->pen_point += $point;

        //     // $userPoint->update();
        //     // $order->point += $point;
        //     $order->save();
        //     echo 'Order Saved';
        //     // if ($product) {
        //     //     $vendor = User::find($product->user_id);
        //     //     if ($vendor->role_id == 1) {
        //     //         $account = VendorAccount::where('vendor_id', 1)->first();
        //     //         $account->pending_amount += $vp;
        //     //         $account->save();
        //     //     } else {

        //     //         $grand_total = $price * $item->qty;

        //     //         if ($vendor->shop_info->commission == NULL) {
        //     //             $commission  = (setting('shop_commission') / 100) * $grand_total;
        //     //             $amount = $grand_total - $commission;
        //     //         } else {
        //     //             $commission  = ($vendor->shop_info->commission / 100) * $grand_total;
        //     //             $amount = $grand_total - $commission;
        //     //         }
        //     //         $adminAccount = VendorAccount::where('vendor_id', 1)->first();
        //     //         $adminAccount->update([
        //     //             'pending_amount' => $adminAccount->pending_amount + $commission
        //     //         ]);

        //     //         $vendor->vendorAccount()->update([
        //     //             'pending_amount' => $vendor->vendorAccount->pending_amount + $amount
        //     //         ]);

        //     //         $check = Commission::where('user_id', $product->user_id)->where('order_id', $order->id)->first();
        //     //         if (!$check) {
        //     //             Commission::create([
        //     //                 'user_id'  => $product->user_id,
        //     //                 'order_id' => $order->id,
        //     //                 'amount'   => $commission,
        //     //                 'status' => '0',
        //     //             ]);
        //     //         } else {
        //     //             $check->amount = $check->amount + $commission;
        //     //             $check->update();
        //     //         }
        //     //     }
        //     //     $product->quantity = $product->quantity - $item->qty;
        //     //     $product->save();
        //     // }
        // }

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

            echo 'Thanks for your order, your invoice number is: ' . $data['invoice'] . ' <b><a href="/">Back to home</a></b>';

            
        }
    }



    /**
     * store customer order
     *
     * @param  mixed $request
     * @return void
     */
    public function orderStore(Request $request)
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
            'email'           => 'required|email|string|max:255',
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

        
        $seller_count=$request->seller_count;
        if($request->stotal > setting('shipping_free_above')){
            $shipping_charge = 0;
            $single_charge = 0;
        } else{
            if ($request->city == 'Dhaka') {
                $shipping_charge = setting('shipping_charge') * $seller_count;
                $single_charge = setting('shipping_charge');
            } else {
                $shipping_charge = setting('shipping_charge_out_of_range') * $seller_count;
                $single_charge = setting('shipping_charge_out_of_range');
            }
        }

        $cart_subtotal = $request->stotal;
        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['name'];
            $discount    = Session::get('coupon')['discount'];
            $total       = ($cart_subtotal + $shipping_charge) - $discount;
        }
        
        if (Session::has('coupon')) {
            $wl=$total ;
        }else{
            $wl=$cart_subtotal+$shipping_charge;
        }
        
        if($request->payment_method=='wallate'){
            if($wl>auth()->user()->wallate){
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            }else{
                $user=User::find(auth()->id());
                $user->wallate =$user->wallate -$wl;
                $user->update();
            }
        }
                
        if($request->partial_paid>0){
            if($request->partial_paid > auth()->user()->wallate){
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            }else{
                $user=User::find(auth()->id());
                $user->wallate =$user->wallate -$request->partial_paid;
                $user->update();
            }
        }
        
        
        $order = Order::create([
            'user_id'         => auth()->id(),
            'refer_id'     => auth()->user()->refer,
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'company_name'    => $request->company,
            'country'         => $request->country,
            'address'         => $request->address,
            'town'            => $request->city,
            'district'        => $request->district,
            'thana'        => $request->thana,
            'post_code'       => $request->postcode,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'shipping_method' => $request->shipping_method,
            'shipping_charge' => $shipping_charge,
            'single_charge' => $single_charge,
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
            'is_pre'        => $request->pr ?? 0,
            'total'           => $total ?? $cart_subtotal+$shipping_charge,
            'cart_type'     =>1,    
        ]);
        
        $chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle($chars), 0, 10);
        
        $order->update([
            'order_id' => $order_id,
            'invoice'  => '#'.str_pad($order->id, 5, 0, STR_PAD_LEFT),
        ]);
      
        
         $total_refer=0;
           $usids=[];
        foreach (Cart::content() as $item) {
            $pp=Product::find($item->id);
           if (!in_array("$pp->user_id", $usids)) {
                $usids[]=$pp->user_id;
            }
            
            $total_refer+=(($item->price/100)*$item->qty);
            if($item->qty>=6 && $pp->whole_price >0){
                $price=$pp->whole_price;
            }else{
                $price= $item->price;
            }
            $vendor = User::find($pp->user_id);
            $vp=$price*$item->qty;
             if ($vendor->role_id == 1) {
                   $gt = $vp;
             }else{
             if ($vendor->shop_info->commission == NULL) {
                  $commission  = (setting('shop_commission') / 100) * $vp;
                  $gt = $vp - $commission;
              }
              else {
                  $commission  = ($vendor->shop_info->commission / 100) * $vp;
                  $gt = $vp - $commission;
              }
             }   
            $order->orderDetails()->create([
                'product_id'  => $item->id,
                'seller_id'     =>$pp->user_id,
                'title'       => $item->name,
                'color'       => $item->options->color,
                'size'        => json_encode($item->options->attributes),
                'qty'         => $item->qty,
                'price'       => $price,
                'total_price' => $price*$item->qty,
                'g_total'=>$gt
            ]);
            
            $product = Product::find($item->id);
            $userPoint=User::find(auth()->id());
            $pointp=$product->point*$item->qty;
            if(setting('is_point')==1){
                $point=$pointp;
            }else{
                $point=0;
            }
            $userPoint->pen_point+=$point;

            $userPoint->update();
             $order->point+=$point;
        $order->save();
            if ($product) {
                $vendor = User::find($product->user_id);
                if ($vendor->role_id == 1) {
                    $account = VendorAccount::where('vendor_id', 1)->first();
                    $account->pending_amount += $vp;
                    $account->save();
                }
                else {
                   
                       $grand_total=$price*$item->qty;
                   
                    if ($vendor->shop_info->commission == NULL) {
                        $commission  = (setting('shop_commission') / 100) * $grand_total;
                        $amount = $grand_total - $commission;
                    }
                    else {
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
                            'status'=>'0',
                        ]);
                    }else{
                        $check->amount=$check->amount+$commission;
                        $check->update();
                    }
                }
                $product->quantity = $product->quantity - $item->qty;
                $product->save();
            }
        }
       
         foreach($usids as $seller){
            $total= DB::table('order_details')->where('seller_id',$seller)->where('order_id',$order->id)->sum('total_price');
            $total+=$single_charge;
            DB::table('multi_order')->insert(
                ['vendor_id' => $seller, 'order_id' => $order->id,'partial_pay'=>0,'status'=>0,'total'=>$total]
            );
        }
        if($request->payment_method=='wallate'){
            $order->update([
                'pay_staus' => 1,
                'pay_date'  => date('d-m-y'),
            ]);
        }
            if($request->partial_paid < auth()->user()->wallate && $request->partial_paid>0){
            $parts=DB::table('multi_order')->where('order_id',$order->id)->get();
            $amount=$request->partial_paid;
            foreach($parts as $part){
              if($amount>0){
                  if($part->partial_pay!=$part->total){
                      $total_requested=$part->partial_pay+$amount;
                        
                      if($total_requested > $part->total){
                          $new_balance=$total_requested-$part->total;
                          $slice=$amount-$new_balance;
                          $amount-=$slice;
                      }else{
                          $slice=$amount;
                          $amount-=$slice;
                      }
                      
                      DB::table('multi_order')->where('id',$part->id)->update(['partial_pay'=>$part->partial_pay+$slice]);
                      
                  }
                }
            }
              PartialPayment::create([
                'order_id'=>$order->id,
                'payment_method'=>'wall',
                'amount'=>$request->partial_paid,
                'status'=>1,
               ]);
            
        }
         
        if (Session::has('coupon')) {
            $n_parts=DB::table('multi_order')->where('order_id',$order->id)->get();
            $n_amount=$discount;
            foreach($n_parts as $n_part){
              if($n_amount>0){
                  if($n_part->partial_pay!=$n_part->total){
                      $n_total_requested=$n_part->discount+$n_amount;
                        
                      if($n_total_requested > $n_part->total){
                          $n_new_balance=$n_total_requested-$n_part->total;
                          $n_slice=$n_amount-$n_new_balance;
                          $n_amount-=$n_slice;
                      }else{
                          $n_slice=$n_amount;
                          $n_amount-=$n_slice;
                      }
                      
                      DB::table('multi_order')->where('id',$n_part->id)->update(['discount'=>$n_part->partial_pay+$n_slice]);
                      
                  }
                }
            }
        }
        Cart::destroy();
        Session::forget('coupon');
        $order->update([ 'refer_bonus' => $total_refer]);
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
         $cart=CartInfo::where('user_id',auth()->id())->delete();
        if($request->payment_method=='aamarpay'){
            $amn=$total ?? $cart_subtotal+$shipping_charge;
            $this->paynow($request,$amn,$order->id);
        }elseif($request->payment_method=='uddoktapay'){
            $amn=$total ?? $cart_subtotal+$shipping_charge;
            $url=$this->uddokpay($request,$amn,$order->id);
            if($url){
                 return Redirect::to($url);
            }
        }else{
            if(setting('mail_config')==1){
             Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
        {
            $mail->from(config('mail.from.address'),  config('app.name'))
                ->to($data['email'], $data['name'])
                ->subject('Order Invoice');
        });
        }
       
        notify()->success("Your order successfully done", "Congratulations");
        return redirect()->route('order');
        }
       
    }
    
    /**
     * store customer buy now order order
     *
     * @param  mixed $request
     * @return void
     */
    
    
     public function orderBuyNowStore_guest(Request $request)
     {

        // dd($request);
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
            'email'           => 'required|email|string|max:255',
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
        $product  = Product::find($request->id);
        if($product->download_able !=1){
            // if ($request->city == 'Dhaka') {
            //     $shipping_charge = setting('shipping_charge');
            // }
            // else {
            //     $shipping_charge = setting('shipping_charge_out_of_range');
            // }
            if($request->stotal > setting('shipping_free_above')){
                $shipping_charge = 0;
            } else{
                if ($request->city == 'Dhaka') {
                    $shipping_charge = setting('shipping_charge');
                } else {
                    $shipping_charge = setting('shipping_charge_out_of_range');
                }
            }
        } else{
            $shipping_charge=0;
        }

        $total_refer=$product->regular_price/100;

        // $userPoint=User::find(auth()->id());
        // $pointp=$product->point*$request->qty;
        // if(setting('is_point')==1){
        //     $point=$pointp;
        // }else{
        //     $point=0;
        // }
        // $userPoint->pen_point+=$point;

        // $userPoint->update();

        if($request->qty>=6 && $product->whole_price >0){
            $subtotal = $product->whole_price  * $request->qty;
        }else{
            $subtotal = $request->dynamic_prices * $request->qty;
        }

        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['name'];
            $discount    = Session::get('coupon')['discount'];
            $total       = ($subtotal + $shipping_charge) - $discount;
        }
        
        if (Session::has('coupon')) {
            $wl=$total ;
        }else{
            $wl=$subtotal+$shipping_charge;
        }
        if($request->payment_method=='wallate'){
            if($wl>auth()->user()->wallate){
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            }else{
                $user=User::find(auth()->id());
                $user->wallate =$user->wallate -$wl;
                $user->update();
            }
        }
        
        // if($request->partial_paid>0){
        //     if($request->partial_paid > auth()->user()->wallate){
        //         notify()->warning("don't have enough balance in wallate", "Warning");
        //         return redirect()->back();
        //     }else{
        //         $user=User::find(auth()->id());
        //         $user->wallate =$user->wallate -$request->partial_paid;
        //         $user->update();
        //     }
        // }
    
        $order = Order::create([
            'user_id'         => auth()->id(),
            // 'refer_id'        => auth()->user()->refer,
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
            'payment_method'  => $request->payment_method,
            'mobile_number'   => $request->mobile_number,
            'transaction_id'  => $request->transaction_id,
            'bank_name'       => $request->bank_name,
            'account_number'  => $request->account_number,
            'holder_name'     => $request->holder_name,
            'branch_name'     => $request->branch,
            'routing_number'  => $request->routing,
            'coupon_code'     => $coupon_code ?? '',
            'subtotal'        => $subtotal,
            'discount'        => $discount ?? 0,
            'is_pre'          => $request->pr ?? 0,
            'total'           => $total ?? $subtotal+$shipping_charge,
            'meet_time'       =>$request->meet
        ]);
        
        $chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle($chars), 0, 10);
        
        $order->update([
            'order_id' => $order_id,
            'invoice'  => '#'.str_pad($order->id, 5, 0, STR_PAD_LEFT),
        ]);
        
        if($request->qty>=6 && $product->whole_price >0){
            $price=$product->whole_price;
        }else{
            $price=$request->dynamic_prices;
        }
        
        $vendor = User::find($product->user_id);
            $vp=$price*$request->qty;
            if ($vendor->role_id == 1) {
                $gt = $vp;
            }else{
            if ($vendor->shop_info->commission == NULL) {
                $commission  = (setting('shop_commission') / 100) * $vp;
                $gt = $vp - $commission;
            }
            else {
                $commission  = ($vendor->shop_info->commission / 100) * $vp;
                $gt = $vp - $commission;
            }}
        $order->orderDetails()->create([
            'product_id'  => $product->id,
            'seller_id'     =>$product->user_id,
            'title'       => $product->title,
            'color'       => $request->color,
            'size'        => $request->size,
            'qty'         => $request->qty,
            'price'       => $price,
            'total_price' =>  $total ?? $subtotal+$shipping_charge,
            'g_total'   =>$gt
        ]);
        DB::table('multi_order')->insert(
            ['vendor_id' => $product->user_id, 'order_id' => $order->id,'partial_pay'=>0,'status'=>0,'total'=>$subtotal+$shipping_charge]
        );
        if($request->payment_method=='wallate'){
            $order->update([
                'pay_staus' => 1,
                'pay_date'  => date('d-m-y'),
            ]);
        }
        // if($request->partial_paid < auth()->user()->wallate && $request->partial_paid>0){
        //     $parts=DB::table('multi_order')->where('order_id',$order->id)->get();
        //     $amount=$request->partial_paid;
        //     foreach($parts as $part){
        //     if($amount>0){
        //         if($part->partial_pay!=$part->total){
        //             $total_requested=$part->partial_pay+$amount;
                        
        //             if($total_requested > $part->total){
        //                 $new_balance=$total_requested-$part->total;
        //                 $slice=$amount-$new_balance;
        //                 $amount-=$slice;
        //             }else{
        //                 $slice=$amount;
        //                 $amount-=$slice;
        //             }
                    
        //             DB::table('multi_order')->where('id',$part->id)->update(['partial_pay'=>$part->partial_pay+$slice]);
                    
        //         }
        //         }
        //     }
        //     // PartialPayment::create([
        //     //     'order_id'=>$order->id,
        //     //     'payment_method'=>'wall',
        //     //     'amount'=>$request->partial_paid,
        //     //     'status'=>1,
        //     // ]);
            
        // }
        if (Session::has('coupon')) {
            $n_parts=DB::table('multi_order')->where('order_id',$order->id)->get();
            $n_amount=$discount;
            foreach($n_parts as $n_part){
            if($n_amount>0){
                if($n_part->partial_pay!=$n_part->total){
                    $n_total_requested=$n_part->discount+$n_amount;
                        
                    if($n_total_requested > $n_part->total){
                        $n_new_balance=$n_total_requested-$n_part->total;
                        $n_slice=$n_amount-$n_new_balance;
                        $n_amount-=$n_slice;
                    }else{
                        $n_slice=$n_amount;
                        $n_amount-=$n_slice;
                    }
                    
                    DB::table('multi_order')->where('id',$n_part->id)->update(['discount'=>$n_part->partial_pay+$n_slice]);
                    
                }
                }
            }
        }
        if ($product) {
            $vendor = User::find($product->user_id);
            if ($vendor->role_id == 1) {
                $account = VendorAccount::where('vendor_id', 1)->first();
                $account->pending_amount += $wl;
                $account->save();
            }
            else {
            if (Session::has('coupon')) {
                    $grand_total=$total-$shipping_charge ;
                    }else{
                    $grand_total=$subtotal;
                    }
                if ($vendor->shop_info->commission == NULL) {
                    $commission    = (setting('shop_commission') / 100) * $grand_total;
                    $vendor_amount = $grand_total - $commission;
                }
                else {
                    $commission    = ($vendor->shop_info->commission / 100) * $grand_total;
                    $vendor_amount = $grand_total - $commission;
                }
                $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                $adminAccount->update([
                    'pending_amount' => $adminAccount->pending_amount + $commission
                ]);

                $vendor->vendorAccount()->update([
                    'pending_amount' => $vendor->vendorAccount->pending_amount + $vendor_amount
                ]);
                
                Commission::create([
                    'user_id'  => $product->user_id,
                    'order_id' => $order->id,
                    'amount'   => $commission,
                    'status'=>'0',
                ]);
            }
            $product->quantity = $product->quantity - $request->qty;
            $product->save();
        }
        Session::forget('coupon');
        $order->update([ 'refer_bonus' => $total_refer]);
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
        if($request->payment_method=='aamarpay'){
            $amn=$total ?? $subtotal+$shipping_charge;
            $this->paynow($request,$amn,$order->id);
        }elseif($request->payment_method=='uddoktapay'){
            $amn=$total ?? $subtotal+$shipping_charge;
            $url=$this->uddokpay($request,$amn,$order->id);
            if($url){
                return Redirect::to($url);
            }
        }else{
            if(env('mail_config')==1){
            Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
            {
                $mail->from(config('mail.from.address'), config('app.name') )
                    ->to($data['email'],$data['name'])
                    ->subject('Order Invoice');
            });}
        
            // notify()->success("Your order successfully done", "Congratulations");
            echo 'Thanks for your order, your invoice number is: ' . $data['invoice'] . ' <b><a href="/">Back to home</a></b>';

            if($product->download_able==1){
                return redirect()->route('download');
            }
            // return redirect()->route('order');
        }
    
    }
    
    
    public function orderBuyNowStore(Request $request)
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
            'email'           => 'required|email|string|max:255',
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
        $product  = Product::find($request->id);
        if($product->download_able !=1){
            
            
            if ($request->city == 'Dhaka') {
                $shipping_charge = setting('shipping_charge');
            }
            else {
                $shipping_charge = setting('shipping_charge_out_of_range');
            }
            
        }else{
            $shipping_charge=0;
        }

    
        $total_refer=$product->regular_price/100;
        
    

        $userPoint=User::find(auth()->id());
        $pointp=$product->point*$request->qty;
        if(setting('is_point')==1){
            $point=$pointp;
        }else{
            $point=0;
        }
        $userPoint->pen_point+=$point;

        $userPoint->update();

        

        if($request->qty>=6 && $product->whole_price >0){
            $subtotal = $product->whole_price  * $request->qty;
        }else{
            $subtotal = $request->dynamic_prices * $request->qty;
        }


        if (Session::has('coupon')) {
            $coupon_code = Session::get('coupon')['name'];
            $discount    = Session::get('coupon')['discount'];
            $total       = ($subtotal + $shipping_charge) - $discount;
        }
        
        if (Session::has('coupon')) {
            $wl=$total ;
         }else{
            $wl=$subtotal+$shipping_charge;
         }
          if($request->payment_method=='wallate'){
            if($wl>auth()->user()->wallate){
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            }else{
                $user=User::find(auth()->id());
                $user->wallate =$user->wallate -$wl;
                $user->update();
            }
        }
        
        
        if($request->partial_paid>0){
            if($request->partial_paid > auth()->user()->wallate){
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            }else{
                $user=User::find(auth()->id());
                $user->wallate =$user->wallate -$request->partial_paid;
                $user->update();
            }
        }
    
        $order = Order::create([
            'user_id'         => auth()->id(),
            'refer_id'     => auth()->user()->refer,
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'company_name'    => $request->company,
            'country'         => $request->country,
            'address'         => $request->address,
            'town'            => $request->city,
            'district'        => $request->district,
            'thana'       => $request->thana,
            'post_code'       => $request->postcode,
            'phone'           => $request->phone,
            'email'           => $request->email,
            'shipping_method' => $request->shipping_method,
            'shipping_charge' => $shipping_charge,
            'payment_method'  => $request->payment_method,
            'mobile_number'   => $request->mobile_number,
            'transaction_id'  => $request->transaction_id,
            'bank_name'       => $request->bank_name,
            'account_number'  => $request->account_number,
            'holder_name'     => $request->holder_name,
            'branch_name'     => $request->branch,
            'routing_number'  => $request->routing,
            'coupon_code'     => $coupon_code ?? '',
            'subtotal'        => $subtotal,
            'discount'        => $discount ?? 0,
            'point'=>$point,
            'is_pre'        => $request->pr ?? 0,
            'total'           => $total ?? $subtotal+$shipping_charge,
            'meet_time'=>$request->meet
        ]);
        
        $chars    = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle($chars), 0, 10);
        
        $order->update([
            'order_id' => $order_id,
            'invoice'  => '#'.str_pad($order->id, 5, 0, STR_PAD_LEFT),
        ]);
       
        if($request->qty>=6 && $product->whole_price >0){
            $price=$product->whole_price;
        }else{
            $price=$request->dynamic_prices;
        }
        
          $vendor = User::find($product->user_id);
            $vp=$price*$request->qty;
             if ($vendor->role_id == 1) {
                   $gt = $vp;
             }else{
             if ($vendor->shop_info->commission == NULL) {
                  $commission  = (setting('shop_commission') / 100) * $vp;
                  $gt = $vp - $commission;
              }
              else {
                  $commission  = ($vendor->shop_info->commission / 100) * $vp;
                  $gt = $vp - $commission;
              }}
        $order->orderDetails()->create([
            'product_id'  => $product->id,
            'seller_id'     =>$product->user_id,
            'title'       => $product->title,
            'color'       => $request->color,
            'size'        => $request->size,
            'qty'         => $request->qty,
            'price'       => $price,
            'total_price' =>  $total ?? $subtotal+$shipping_charge,
             'g_total'=>$gt
        ]);
          DB::table('multi_order')->insert(
                ['vendor_id' => $product->user_id, 'order_id' => $order->id,'partial_pay'=>0,'status'=>0,'total'=>$subtotal+$shipping_charge]
            );
        if($request->payment_method=='wallate'){
            $order->update([
                'pay_staus' => 1,
                'pay_date'  => date('d-m-y'),
            ]);
        }
       if($request->partial_paid < auth()->user()->wallate && $request->partial_paid>0){
            $parts=DB::table('multi_order')->where('order_id',$order->id)->get();
            $amount=$request->partial_paid;
            foreach($parts as $part){
              if($amount>0){
                  if($part->partial_pay!=$part->total){
                      $total_requested=$part->partial_pay+$amount;
                        
                      if($total_requested > $part->total){
                          $new_balance=$total_requested-$part->total;
                          $slice=$amount-$new_balance;
                          $amount-=$slice;
                      }else{
                          $slice=$amount;
                          $amount-=$slice;
                      }
                      
                      DB::table('multi_order')->where('id',$part->id)->update(['partial_pay'=>$part->partial_pay+$slice]);
                      
                  }
                }
            }
              PartialPayment::create([
                'order_id'=>$order->id,
                'payment_method'=>'wall',
                'amount'=>$request->partial_paid,
                'status'=>1,
               ]);
            
        }
        if (Session::has('coupon')) {
            $n_parts=DB::table('multi_order')->where('order_id',$order->id)->get();
            $n_amount=$discount;
            foreach($n_parts as $n_part){
              if($n_amount>0){
                  if($n_part->partial_pay!=$n_part->total){
                      $n_total_requested=$n_part->discount+$n_amount;
                        
                      if($n_total_requested > $n_part->total){
                          $n_new_balance=$n_total_requested-$n_part->total;
                          $n_slice=$n_amount-$n_new_balance;
                          $n_amount-=$n_slice;
                      }else{
                          $n_slice=$n_amount;
                          $n_amount-=$n_slice;
                      }
                      
                      DB::table('multi_order')->where('id',$n_part->id)->update(['discount'=>$n_part->partial_pay+$n_slice]);
                      
                  }
                }
            }
        }
        if ($product) {
            $vendor = User::find($product->user_id);
            if ($vendor->role_id == 1) {
                $account = VendorAccount::where('vendor_id', 1)->first();
                $account->pending_amount += $wl;
                $account->save();
            }
            else {
               if (Session::has('coupon')) {
                       $grand_total=$total-$shipping_charge ;
                    }else{
                       $grand_total=$subtotal;
                    }
                if ($vendor->shop_info->commission == NULL) {
                    $commission    = (setting('shop_commission') / 100) * $grand_total;
                    $vendor_amount = $grand_total - $commission;
                }
                else {
                    $commission    = ($vendor->shop_info->commission / 100) * $grand_total;
                    $vendor_amount = $grand_total - $commission;
                }
                $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                $adminAccount->update([
                    'pending_amount' => $adminAccount->pending_amount + $commission
                ]);

                $vendor->vendorAccount()->update([
                    'pending_amount' => $vendor->vendorAccount->pending_amount + $vendor_amount
                ]);
                
                Commission::create([
                    'user_id'  => $product->user_id,
                    'order_id' => $order->id,
                    'amount'   => $commission,
                    'status'=>'0',
                ]);
            }
            $product->quantity = $product->quantity - $request->qty;
            $product->save();
        }
        Session::forget('coupon');
        $order->update([ 'refer_bonus' => $total_refer]);
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
        if($request->payment_method=='aamarpay'){
            $amn=$total ?? $subtotal+$shipping_charge;
            $this->paynow($request,$amn,$order->id);
        }elseif($request->payment_method=='uddoktapay'){
            $amn=$total ?? $subtotal+$shipping_charge;
            $url=$this->uddokpay($request,$amn,$order->id);
             if($url){
                 return Redirect::to($url);
            }
        }else{
             if(env('mail_config')==1){
              Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
            {
                $mail->from(config('mail.from.address'), config('app.name') )
                    ->to($data['email'],$data['name'])
                    ->subject('Order Invoice');
            });}
           
            notify()->success("Your order successfully done", "Congratulations");
            if($product->download_able==1){
                 return redirect()->route('download');
            }
            return redirect()->route('order');
        }
      
    }
    
    /**
     * order invoice print
     *
     * @param  mixed $id
     * @return void
     */
    public function orderInvoice($id)
    {
        $order = Order::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('frontend.invoice', compact('order'));
    }
     public function cancel($id)
    {
        $order = Order::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        
         if ($order->status == 0 || $order->status == 1) {
            foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->pending_amount;
                        $vendor->vendorAccount()->update([
                            'pending_amount' => $amount - $item->g_total
                        ]);
                    }
                    else {
                        $grand_total = $item->g_total;
                            $vendor_amount = $grand_total ;;
                         $admin_amount=Commission::where('order_id',$order->id)->first();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $amount = $adminAccount->pending_amount;
                       

                        $vendor->vendorAccount()->update([
                            'pending_amount' => $vendor->vendorAccount->pending_amount - $vendor_amount
                        ]);
                          $adminAccount->update([
                            'pending_amount' => $amount - $admin_amount->amount
                        ]);
                    }
                    
                    $product->quantity = $product->quantity + $item->qty;
                    $product->save();
                }
                
            }
           
            // $order->commission->update([
            //     'status'  => false,
            // ]);
            $order->status = 2;
            $order->save();
            $user=User::find($order->user_id);
            $user->pen_point -=$order->point;
            if($order->payment_method=='wallate'){
            $user->wallate =$user->wallate +$order->total;
            }
            if($user->cancel_attempt == 3){
                $user->status=0;
            }else{
                $user->cancel_attempt +=1;
            }
            $user->update();
            notify()->success("Order Cancel", "Congratulations");
            return redirect()->route('order');
          } 


        
    }


    // Return command by user
    public function return_req($id){
        $order = Order::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($order->status == 3) {
            foreach ($order->orderDetails as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $vendor = User::find($product->user_id);
                    if ($vendor->role_id == 1) {
                        $amount = $vendor->vendorAccount->pending_amount;
                        $vendor->vendorAccount()->update([
                            'pending_amount' => $amount - $item->g_total
                        ]);
                    } else {
                        $grand_total = $item->g_total;
                        $vendor_amount = $grand_total;;
                        $admin_amount = Commission::where('order_id', $order->id)->first();
                        $adminAccount = VendorAccount::where('vendor_id', 1)->first();
                        $amount = $adminAccount->pending_amount;


                        $vendor->vendorAccount()->update([
                            'pending_amount' => $vendor->vendorAccount->pending_amount - $vendor_amount
                        ]);
                        $adminAccount->update([
                            'pending_amount' => $amount - $admin_amount->amount
                        ]);
                    }

                    $product->quantity = $product->quantity + $item->qty;
                    $product->save();
                }
            }

            // $order->commission->update([
            //     'status'  => false,
            // ]);
            $order->status = 6; // return status
            $order->save();
            $user = User::find($order->user_id);
            $user->pen_point -= $order->point;
            if ($order->payment_method == 'wallate') {
                $user->wallate = $user->wallate + $order->total;
            }
            if ($user->cancel_attempt == 3) {
                $user->status = 0;
            } else {
                $user->cancel_attempt += 1;
            }
            $user->update();
            notify()->success("Order Return", "Congratulations");
            return redirect()->route('order');
        }
    }

    
    /**
     * ordered product review
     *
     * @param  mixed $slug
     * @return void
     */
    public function review($orderId)
    {
        $order = Order::where('user_id', auth()->id())->where('order_id', $orderId)->firstOrFail();
        return view('frontend.review', compact('order'));
    }
    
    /**
     * store product review
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function storeReview(Request $request, $id)
    {
        $this->validate($request, [
            'rating' => 'required|integer',
            'review' => 'required|string'
        ]);
        
        $check = Review::where('user_id', auth()->id())->where('product_id', $id)->first();
        if ($check) {
            notify()->warning("You are already review this product", "Sorry");
            return back();
        }
        $book = $request->file('report');
        if ($book) {
            $bookName=$this->upload($book);
        }
        $book2 = $request->file('report2');
        if ($book2) {
            $bookName2=$this->upload($book2);
        }
        $book3 = $request->file('report3');
        if ($book3) {
            $bookName3=$this->upload($book3);
        }
        $book4 = $request->file('report4');
        if ($book4) {
            $bookName4=$this->upload($book4);
        }
        $book5 = $request->file('report5');
        if ($book5) {
            $bookName5=$this->upload($book5);
        }


        Review::create([
            'user_id'    => auth()->id(),
            'product_id' => $id,
            'rating'     => $request->rating,
            
            'file'      => $bookName??'',
            'file1'      => $bookName1??'',
            'file2'      => $bookName2??'',
            'file3'      => $bookName3??'',
            'file4'      => $bookName4??'',
            'file5'      => $bookName5??'',
            'body'       => $request->review
        ]);

        notify()->success("For your awesome review, enjoy and shopping now", "Thanks!!");
        return back();
    }
    public function upload($book){
            $currentDate = Carbon::now()->toDateString();
            $bookName = $currentDate.'-'.uniqid().'.'.$book->getClientOriginalExtension();
            if (!file_exists('uploads/review')) {
                mkdir('uploads/review', 0777, true);
            }
            $book->move(public_path('uploads/review'), $bookName);
            return $bookName;
    }
    
    /**
     * show download view file
     *
     * @return void
     */
    public function download()
    {
        $orders = auth()->user()->orders;
        $items = [];
        foreach ($orders as $order) {
            
            foreach ($order->orderDetails as $item) {
                $items[] = $item;
            }
        }
        return view('frontend.download', compact('items'));
    }

    public function downloadProductFile($pro_id, $id)
    {
        $download = DownloadProduct::findOrFail($id);
        $product  = Product::where('id', $pro_id)->where('download_able', true)->firstOrFail();
        $check    = DownloadUserProduct::where('user_id', auth()->id())
                                    ->where('product_id', $product->id)
                                    ->where('download_id', $id)
                                    ->count();
        if ($product->download_expire < date('Y-m-d')) {
            notify()->warning("Download date expired", "Date Expired");
            return back();
        }
        if ($check < $product->download_limit) {
            if ($download->url == NULL) {
                if (file_exists('uploads/product/download/'.$download->file)) {
                    
                    DownloadUserProduct::create([
                        'user_id'     => auth()->id(),
                        'product_id'  => $product->id,
                        'download_id' => $id
                    ]);
                    return response()->download(public_path('uploads/product/download/'.$download->file));
                }
                else {
                    notify()->error("File not found", "Not Found");
                    return back();
                }
            }
            else {
                DownloadUserProduct::create([
                    'user_id'     => auth()->id(),
                    'product_id'  => $product->id,
                    'download_id' => $id
                ]);
                return redirect()->to($download->url);
            }
        }
        else {
            notify()->warning("Already you have been download ".$product->download_limit." time", "Download Expired");
            return back();
        }
    }
    
    /**
     * buy product
     *
     * @param  mixed $request
     * @return void
     */
    public function buyProduct(Request $request)
    {

        // dd($request);

        $this->validate($request, [
            'id'    => 'required|integer',
            'qty'   => 'required|integer',
            'color' => 'nullable|string',
            'size'  => 'nullable|string'
        ]);
        $product = Product::find($request->id);
        if($product->colors->count()>0 && $request->color=='blank'){
            notify()->warning("Please Choose a Colour", "Something Wrong");
            return back();
        }
        $attributes = Attribute::all();
        foreach ($attributes as $attribute){
            $slug=$attribute->slug;
            $s =$request->$slug;
            if($s=='blank'){
                notify()->warning("Sorry,Please Fill All Attribute", "Something Wrong");
                return back();
            }
        }
        
        if (!$product) {
            notify()->warning("Sorry, please try again", "Something Wrong");
            return back();
        }

        return view('frontend.checkout', compact('request', 'product'));

    }
    public function payform($slug){
        $order=Order::where('order_id',$slug)->first();
        $sum=PartialPayment::where('order_id',$order->id)->where('status','1')->sum('amount');
        $partials=PartialPayment::where('order_id',$order->id)->get();
        if(!empty($partial)){
            $sum='00';
        }
        return view('frontend.partials',compact('order','sum','partials'));
    }
    public function payCreate(Request $request,$slug){
        if($request->pm=='wall'){
            if($request->amount > auth()->user()->wallate){
                notify()->warning("don't have enough balance in wallate", "Warning");
                return redirect()->back();
            }else{
                $user=User::find(auth()->id());
                $user->wallate =$user->wallate -$request->amount;
                $user->update();
                $parts=DB::table('multi_order')->where('order_id',$slug)->get();
                $amount=$request->amount;
                foreach($parts as $part){
                    if($amount>0){
                        if($part->partial_pay!=$part->total){
                            $total_requested=$part->partial_pay+$amount;
                              
                            if($total_requested > $part->total){
                                $new_balance=$total_requested-$part->total;
                                $slice=$amount-$new_balance;
                                $amount-=$slice;
                            }else{
                                $slice=$amount;
                                $amount-=$slice;
                            }
                            
                            DB::table('multi_order')->where('id',$part->id)->update(['partial_pay'=>$part->partial_pay+$slice]);
                            
                        }
                    }
                    
                    
        }
        
            }
            $status=1;
        }else{
             $status=0;
        }
        
       
       PartialPayment::create([
        'order_id'=>$slug,
        'payment_method'=>$request->pm,
        'transaction_id'=>$request->tnx,
        'amount'=>$request->amount,
        'status'=>$status,
       ]);
        notify()->success("Success", "Success");
            return back();
    }
    public function uddokpay($request,$amn,$id){
        $requestData = [
            'full_name'    => $request->first_name.$request->last_name,
            'email'        =>  $request->email,
            'amount'       =>$amn, 
            'metadata'     => [
                'order_id'   => $id,
                'metadata_1' => 'foo',
                'metadata_2' => 'bar',
            ],
            'redirect_url'  => route('uddoktapay.success'),
            'return_type'   => 'GET',
            'cancel_url'    => route('uddoktapay.cancel'),
            'webhook_url'   => route('uddoktapay.webhook'),
        ];

        try {
            $paymentUrl = UddoktaPay::init_payment($requestData);
            return $paymentUrl;
 
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
    
    public function paynow($request,$amn,$id){
        if(setting('amode')=='2' ){
            $url = 'https://secure.aamarpay.com/request.php';
        }else{
            $url = 'https://sandbox.aamarpay.com/request.php';
        }

            $fields = array(
                'store_id' => setting('astore'), //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
                 'amount' => $amn, //transaction amount
                'payment_type' => 'VISA', //no need to change
                'currency' => 'BDT',  //currenct will be USD/BDT
                'tran_id' => rand(1111111,9999999), //transaction id must be unique from your end
                'cus_name' =>  $request->first_name.$request->last_name,  //customer name
                'cus_email' =>  $request->email, //customer email address
                'cus_add1' => $request->address,  //customer address
                'cus_add2' => $request->address, //customer address
                'cus_city' =>  $request->city,  //customer city
                'cus_state' =>  $request->city,  //state
                'cus_postcode' =>$request->postcode, //postcode or zipcode
                'cus_country' => 'Bangladesh',  //country
                'cus_phone' => $request->phone, //customer phone number
                'cus_fax' => 'Not¬Applicable',  //fax
                'ship_name' => $request->first_name.$request->last_name, //ship name
                'ship_add1' => $request->address,  //ship address
                'ship_add2' => $request->address,
                'ship_city' => $request->city,
                'ship_state' =>$request->city,
                'ship_postcode' => '1212', 
                'ship_country' => 'Bangladesh',
                'desc' => 'Product Purches', 
                'success_url' => route('success'), //your success route
                'fail_url' => route('fail'), //your fail route
                'cancel_url' => 'http://localhost/foldername/cancel.php', //your cancel url
                'opt_a' => $id,  //optional paramter
                'opt_b' => '',
                'opt_c' => '', 
                'opt_d' => '',
                'signature_key' => setting('akey')); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

                $fields_string = http_build_query($fields);
         
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_URL, $url);  
      
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));	
            curl_close($ch); 

            $this->redirect_to_merchant($url_forward);
    }
    function redirect_to_merchant($url) {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head><script type="text/javascript">
            function closethisasap() { document.forms["redirectpost"].submit(); } 
          </script></head>
          <body onLoad="closethisasap();">
          <?php
            if(setting('amode')=='2' ){
                $base = 'https://secure.aamarpay.com/';
            }else{
                $base = 'https://sandbox.aamarpay.com/';
            }
          ?>
            <form name="redirectpost" method="post" action="<?php echo $base.$url; ?>"></form>
            
          </body>
        </html>
        <?php	
        
    } 
     public function webhook(Request $request)
    {

        $headerAPI = isset($_SERVER['HTTP_RT_UDDOKTAPAY_API_KEY']) ? $_SERVER['HTTP_RT_UDDOKTAPAY_API_KEY'] : NULL;

        if (empty($headerAPI)) {
            return response("Api key not found", 403);
        }

        if ($headerAPI != setting("uapi")) {
            return response("Unauthorized Action", 403);
        }

        $bodyContent = trim($request->getContent());
        $bodyData = json_decode($bodyContent);
        $data = UddoktaPay::verify_payment($bodyData->invoice_id);
        if (isset($data['status']) && $data['status'] == 'COMPLETED') {
            // Do action with $data
        }
    }
    public function success2(Request $request)
    {

        // dd($request);

        if (empty($request->invoice_id)) {
            die('Invalid Request');
        }

        $data = UddoktaPay::verify_payment($request->invoice_id);
        if (isset($data['status']) && $data['status'] == 'COMPLETED') {
            // do action with $data
            $order_id=$data['metadata']['order_id'];
          
            $order=Order::find($order_id);
            $order->pay_staus=1;
            $order->pay_date=date('m/d/y');
            $order->transaction_id=$data['transaction_id'];
            $order->save();
            $data = [
                'order_id'        => $order->order_id,
                'invoice'         => $order->invoice,
                'name'            => $order->first_name,
                'phone'           => $order->phone,
                'email'           => $order->email,
                'address'         => $order->address,
                'coupon_code'     => $order->coupon_code,
                'subtotal'        => $order->subtotal,
                'shipping_charge' => $order->shipping_charge,
                'discount'        => $order->discount,
                'total'           => $order->total,
                'date'            => $order->created_at,
                'payment_method'            => $order->payment_method,
                'pay_status'            => $order->pay_staus,
                'pay_date'            => $order->pay_date,
                'orderDetails'    => $order->orderDetails
            ];
             if(env('mail_config')==1){
            Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
            {
                $mail->from(config('mail.from.address'), config('app.name') )
                ->to($data['email'],$data['name'])
                ->subject('Order Invoice');
            });}
            notify()->success("Your order successfully done", "Congratulations");
            return redirect()->route('home');
        } else {
            // pending payment
            // dd($data);
            notify()->warning("Your order successfully done, but payment is pending", "Congratulations");
            return redirect()->route('home');
        }
    }
    public function success(Request $request){
        $order_id=$request->opt_a;
        $order=Order::find($order_id);
        $order->pay_staus=1;
        $order->pay_date=date('m/d/y');
        $order->transaction_id=$request->tran_id;
        $order->save();
        $data = [
            'order_id'        => $order->order_id,
            'invoice'         => $order->invoice,
            'name'            => $request->first_name,
            'email'           => $request->cus_email,
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
            'orderDetails'    => $order->orderDetails
        ];
         if(env('mail_config')==1){
        Mail::send('frontend.invoice-mail', $data, function($mail) use ($data)
        {
            $mail->from(config('mail.from.address'), config('app.name') )
            ->to($data['email'],$data['name'])
            ->subject('Order Invoice');
        });}
        notify()->success("Your order successfully done", "Congratulations");
        return redirect()->route('home');
    }
    public function cancel2()
    {
       notify()->warning("Your order  Placed But Payment fail", "Warning");
        return redirect()->route('order');
    }

    public function fail(Request $request){
         notify()->warning("Your order  Placed But Payment fail", "Warning");
        return redirect()->route('order');
    }
}