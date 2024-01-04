<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Sorting;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShopInfo;
use App\Models\User;

use App\Models\VendorAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index($slug,Request $request)
    {
        $shop = ShopInfo::where('slug', $slug)->firstOrFail();
         $i=1;
        if ($request->ajax()) {
            $skip=$request->skip/2;
        }else{
            $skip=0;
        }

        $products=$shop->user->products->skip($skip)->take(16);
            $data = '';
        $data2 = '';
        if ($request->ajax()) {
            if($products->count() > 0){
            foreach ($products as $product) {
                $data .= View::make("components.product-grid-view")
                ->with("product", $product)
                ->render();
                $data2 .= View::make("components.product-list-view")
                ->with("product", $product)
                ->render();
            }}
            return json_encode(array($data, $data2));;
        }
        return view('frontend.vendor', compact('shop','products'));
    }

    public function showAllVendors()
    {
        $shops = ShopInfo::latest('id')->get();
        return view('frontend.vendor-list', compact('shops'));
    }

    public function productSearch(Request $request)
    {
        $shop = ShopInfo::where('slug', $request->id)->firstOrFail();
        $user = $shop->user;

        $sort  = new Sorting();
        $value = $sort->getValue($request->sort);
        if ($request->keyword == null) {
            
            if ($value == $sort->oldToNew) {
                $products = Product::filter('user_id', $user->id)->filter('status', true)->orderBy('id', 'asc')->get();
            }
            elseif ($value == $sort->highToLow) {
                $products = Product::filter('user_id', $user->id)->filter('status', true)->orderBy('regular_price', 'desc')->get();
            }
            elseif ($value == $sort->lowToHigh) {
                $products = Product::filter('user_id', $user->id)->filter('status', true)->orderBy('regular_price', 'asc')->get();
            }
            else {
                $products = Product::filter('user_id', $user->id)->filter('status', true)->orderBy('id', 'desc')->get();
            }

        } else {
            $products = Product::whereLike(['title', 'full_description', 'tags.name'], $request->keyword)
                            ->filter('user_id', $user->id)
                            ->filter('status', true)
                            ->orderBy('id', 'desc')
                            ->get();
        }
        
        

        
        return view('frontend.vendor-search', compact('shop', 'products', 'request'));
    }

    // show vendor setup form
    public function showSetupVendorFrom()
    {
        return view('frontend.setup-vendor');
    }

    // setup vendor
    public function setupVendor(Request $request)
    {
        $this->validate($request, [
            'shop_name'    => 'required|string|max:255',
            'url'          => 'nullable|max:255',
            'mobile' => 'required|string|max:255',
            'pgmail' => 'required|string|max:255',
            'bank_account' => 'nullable|string|max:255',
            'bank_name'    => 'nullable|string|max:255',
            'holder_name'  => 'nullable|string|max:255',
            'branch_name'  => 'nullable|string|max:255',
            'routing'      => 'nullable|string|max:255',
            'address'      => 'required|string|max:255',
            'description'  => 'required|string',
            'selfi'      => 'required|image',
            'nid'      => 'required|image',
            'nidb'      => 'required|image',
            'trade'      => 'required|image',
            'profile'      => 'required|image',
            'cover_photo'  => 'required|image'
        ]);

        $profile = $request->file('profile');
        $cover   = $request->file('cover_photo');
        $trade   = $request->file('trade');
        $nid   = $request->file('nid');
        $nidb   = $request->file('nidb');
        $selfi   = $request->file('selfi');
        if ($profile) {
            $currentDate = Carbon::now()->toDateString();
            $profileName = $currentDate.'-'.uniqid().'.'.$profile->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/profile')) {
                mkdir('uploads/shop/profile', 0777, true);
            }
            $profile->move(public_path('uploads/shop/profile'), $profileName);
        }
        if ($cover) {
            $currentDate = Carbon::now()->toDateString();
            $coverName   = $currentDate.'-'.uniqid().'.'.$cover->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/cover')) {
                mkdir('uploads/shop/cover', 0777, true);
            }
            $cover->move(public_path('uploads/shop/cover'), $coverName);
        }
            if ($trade) {
            $currentDate = Carbon::now()->toDateString();
            $tradeName   = $currentDate.'-'.uniqid().'.'.$trade->getClientOriginalExtension();
            
            if (!file_exists('uploads/shop/trade')) {
                mkdir('uploads/shop/trade', 0777, true);
            }
            $trade->move(public_path('uploads/shop/trade'), $tradeName);
        }
         if ($nid) {
            $currentDate = Carbon::now()->toDateString();
            $nidName   = $currentDate.'-'.uniqid().'.'.$nid->getClientOriginalExtension();
           
            if (!file_exists('uploads/shop/nid')) {
                mkdir('uploads/shop/nid', 0777, true);
            }
            $nid->move(public_path('uploads/shop/nid'), $nidName);
        }
        if ($nidb) {
            $currentDate = Carbon::now()->toDateString();
            $nidbName   = $currentDate.'-'.uniqid().'.'.$nidb->getClientOriginalExtension();
           
            if (!file_exists('uploads/shop/nidb')) {
                mkdir('uploads/shop/nidb', 0777, true);
            }
            $nidb->move(public_path('uploads/shop/nidb'), $nidbName);
        }
if ($selfi) {
            $currentDate = Carbon::now()->toDateString();
            $selfiName   = $currentDate.'-'.uniqid().'.'.$selfi->getClientOriginalExtension();
           
            if (!file_exists('uploads/shop/selfi')) {
                mkdir('uploads/shop/selfi', 0777, true);
            }
            $selfi->move(public_path('uploads/shop/selfi'), $selfiName);
        }

        $auth = User::find(auth()->id());

        $auth->shop_info()->create([
            'name'         => $request->shop_name,
            'gmail'         => $request->pgmail,
            'mobile'         => $request->mobile,
            'bkash'         => $request->Bkash,
            'nogod'         => $request->Nagad,
            'rocket'         => $request->Rocket,
            'slug'         => rand(pow(10, 5-1), pow(10, 15)-1),
            'address'      => $request->address,
            'url'          => $request->url,
            'bank_account' => $request->bank_account,
            'bank_name'    => $request->bank_name,
            'holder_name'  => $request->holder_name,
            'branch_name'  => $request->branch_name,
            'routing'      => $request->routing,
            'description'  => $request->description,
            'profile'      => $profileName,
            'cover_photo'  => $coverName,
            'trade'  => $tradeName,
            'nid'  => $nidName,
            'selfi'  => $selfiName,
            'nidback'  => $nidbName
        ]);
         VendorAccount::create([
            'vendor_id' => $auth->id
        ]);
        // update customer role 
        $auth->update([
            'role_id' => 2,
            'status' => '1',
            'is_approved' => '0',
        ]);
        
          notify()->error("Your seller account is pending, admin check your information", "warning");
        return redirect()->to('/account');
    }
}