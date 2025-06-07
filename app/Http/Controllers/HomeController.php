<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\miniCategory;
use App\Models\Campaign;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Unproduct;
use App\Models\DeviceId;
use App\Models\Slider;
use App\Models\ShopInfo;
use App\Models\Order;
use App\Models\FbReview; // Import the FbReview model
use View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = Campaign::where([['is_flash', 1], ['end', '<', date('Y-m-d h-m-s')]])->get();
        foreach ($users as $user) {


            $user->is_flash = 0;
            $user->end = Null;
            $user->update();
        }

        $sliders        = Slider::where('status', true)->where('is_pop', false)->where('is_sub', false)->where('is_feature', false)->latest('id')->take(6)->get(['image', 'url']);
        $sliders_f        = Slider::where('status', true)->where('is_sub', false)->where('is_pop', false)->where('is_feature', true)->latest('id')->take(4)->get(['image', 'url']);
        $categories     = Category::where('status', true)->latest('id')->get(['name', 'slug', 'cover_photo']);

        $shops          = ShopInfo::latest('id')->take('6')->get();
        $campaigns_product          = Campaign::where('status', 1)->where('is_flash', '1')->get();
        $i = 1;

        $productIds  = DB::table('category_product')->where('category_id', '!=', ['13', '9'])->get()->pluck('product_id');
        // $products    = Product::whereIn('id', $productIds)->where('status', true)->latest('id')->take(12)->get();
        $products = Product::whereIn('id', $productIds)->where('status', true)->latest('id')->paginate(12); // Show 12 products per page
        $randomProducts = Product::with('brand')->where('status', true)->where('reach', '>', '0')->orderBy('reach', 'DESC')->take('6')->get();

        $unproducts = Unproduct::where('status', 1)->inRandomOrder()->take(6)->get();

        $collections    = Collection::where('status', true)->latest('id')->get();
        // Fetch all Facebook reviews from the database
        $fbReviews = FbReview::all();
        return view('frontend.index', compact(
            'sliders',
            'unproducts',
            'sliders_f',
            'categories',
            'collections',
            'shops',
            'products',
            'randomProducts',
            'campaigns_product',
            'fbReviews'
        ));
    }
    
    
    public function categories_all(Request $request)
    {
    
        $categories     = Category::where('status', true)->latest('id')->get(['name', 'slug', 'cover_photo']);
        $collections    = Collection::where('status', true)->latest('id')->get();

        return view('frontend.categories_all', compact(
            'categories',
            'collections',
        ));
    }
    



    public function superCat(Request $request){
       
        $data = View::make("components.hero-category")->render();
        
        return json_encode($data);
    }
    public function subCat(Request $request){
       
        $data = View::make("components.superCategoryComponent")->render();
        
        return json_encode($data);
    }
    public function sheba(){
          return view('frontend.sheba');
    }
    public function adminLogin(){
        return view('auth.admin-login');
    }
    public function track_form(){
        return view('frontend.track');
    }
    public function tracking(Request $request){
        $this->validate($request, [
            'invoice'             => 'required|string|max:255',
        ]);
        if($request->pt){
            $invoice=$request->invoice;
        }else{
            $invoice='#'.$request->invoice;
        }
        
        $order=Order::where('user_id',auth()->id())->where('invoice',$invoice)->first();
        return view('frontend.track',compact('order'));
    }
    public function allCat(){
        $categories     = Category::where('status', true)->latest('id')->get(['name', 'slug', 'cover_photo']);
        return view('frontend.category',compact('categories'));

    }
     public function saveToken(Request $request)
    {
        $exits=DeviceId::where('device_id',$request->token)->where('user_id',auth()->id())->first();
        if(empty($exits)){
            DeviceId::create([
                'user_id'=>auth()->id(),
                'device_id'=>$request->token
            ]);
        }
    }
    public function sendNotification(Request $request)
    {
        $firebaseToken = DeviceId::pluck('device_id')->all();

         $SERVER_API_KEY = 'AAAA9Ek9F7U:APA91bEtCumEi8v_NmoBW6rQbm48iVNB4ctTguXS5G33Mj1FEmX48zlNYEHLWO3d6WfLkPD3ByKZQPrlJVl0swAd1ZxFWPMHWOdPWXD30sGCOvu_xIV7nTW9PC6cGiL6n3FOBHl1bavE';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
    public function index()
    {
        // Fetch all Facebook reviews from the database
        $fbReviews = FbReview::all();

        // Return the main view and pass the reviews data
        return view('frontend.index', compact('fbReviews'));
    }

    
}