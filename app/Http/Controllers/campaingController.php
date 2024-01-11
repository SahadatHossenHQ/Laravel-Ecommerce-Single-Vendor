<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Campaign;
use App\Models\CampaingComment;
use App\Models\Product;
use App\Models\CampaingProduct;
use Illuminate\Http\Request;
use DB;
use View;
use Whoops\Run;

class campaingController extends Controller
{   
    public function index(){
       $campaigns= Campaign::all();
       return view('admin.e-commerce.campaign.index',compact('campaigns'));
    }
    public function create(){
        $i=1;
        $products =  Product::
        whereHas('categories', function ($query) use ($i) {
            $query->where('categories.status', '=', $i);
        })
        ->whereHas('sub_categories', function ($query) use ($i) {
            $query->where('sub_categories.status', '=', $i);
        })
        // ->whereHas('mini_categories', function ($query) use ($i) {
        //     $query->where('mini_categories.status', '=', $i);
        // })
        ->get();
        return view('admin.e-commerce.campaign.create',compact('products'));
    }
    public function getData(Request $request){

       

        $product_ids = $request->product_ids;
        foreach($product_ids as $product_id){
           $id=$product_id;
        }
        $has=CampaingProduct::where('campaign_id',$request->campaign_id)->where('product_id',$id)->first();
        if($has){
        }else{
           $new= CampaingProduct::create([
                'campaign_id'=>$request->campaign_id,
                'product_id'=>$id,
                'price'=>'0',
            ]);
            $product=Product::where('id',$id)->first();
            return 
             '<tr>
                 
                 <td> <img src="'. asset('uploads/product/'.$product->image) .'" alt="Product Image" style="height: 100px;width: 100px;">  </td>
                 <td>'.$product->title.'</td>
                 <td>'.$product->discount_price.'</td>
                 <td> <input class="cprice" type="number" name="prices[]" id=""> <input type="hidden" name="adds[]" value="'.$product->id.'"> <a href="'.route('admin.campaing.remove',['id'=>$new->id]).'">Remove</a></td>
             </tr>';
        }
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'             => 'required|string|max:255',
            'cover_photo'             => 'required',
        ]);
      
        $cover_photo = $request->file('cover_photo');
        $currentDate = Carbon::now()->toDateString();
        if ($cover_photo) {
            
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (!file_exists('uploads/campaign')) {
                mkdir('uploads/campaign', 0777, true);
            }
            $cover_photo->move(public_path('uploads/campaign'), $imageName);
        }
        $campaign=Campaign::create([
            'name'=>$request->name,
            'slug'=>uniqid(),
            'cover_photo' => $imageName ?? 'default.png',
            'status'      => $request->filled('status'),
            'is_flash'      => $request->filled('flash'),
            'end'      => $request->flash_end??Null
        ]);
        // $i=0;
        // foreach($request->products as $product){
           
        //     CampaingProduct::create([
        //         'campaign_id'=>$campaign->id,
        //         'product_id'=>$product,
        //         'price'=>$request->prices[$i],
        //     ]);
        //     $i++;
        // }
        notify()->success("Campaing successfully created", "Congratulations");
        return back();
    }
    public function status($id){
        $campaign=Campaign::find($id);
        if ($campaign->status) {
            $campaign->status = false;
        } else {
            $campaign->status = true;
        }
        $campaign->save();
        notify()->success("Campaing status successfully updated", "Congratulations");
        return back();
    }
    public function edit($id){
        $i=1;
        $campaing=Campaign::find($id);
       
        $products =  Product::where('status',1)->get();
        
        return view('admin.e-commerce.campaign.create',compact('products','campaing'));
    }
     public function getCOmments($id){
        $i=1;
        $comments=CampaingComment::where('campaign_id',$id)->get();
        return view('admin.e-commerce.campaign.comments',compact('comments'));
    }
    public function update(Request $request){
        $campaign=Campaign::find($request->camid);
        $cover_photo = $request->file('cover_photo');
        if ($cover_photo) {
            $currentDate = Carbon::now()->toDateString();
            $imageName   = $currentDate.'-'.uniqid().'.'.$cover_photo->getClientOriginalExtension();
            

            if (file_exists('uploads/campaign/'.$campaign->cover_photo)) {
                unlink('uploads/campaign/'.$campaign->cover_photo);
            }

            if (!file_exists('uploads/campaign')) {
                mkdir('uploads/campaign', 0777, true);
            }
            $cover_photo->move(public_path('uploads/campaign'), $imageName);
        }
        
        $campaign->name = $request->name;
        $campaign->cover_photo = $imageName ?? $campaign->cover_photo;
        $campaign->is_flash = $request->filled('flash');
        if(!empty($request->flash_end)){
            $campaign->end = $request->flash_end;
        }
       

        $campaign->update();
        $i=0;
        if(!empty($request->adds)){
            foreach($request->adds as $ex){
                $excam=CampaingProduct::where('Product_id',$ex)->where('campaign_id',$request->camid)->first();
                if(!empty($excam)){
                    $excam->price= $request->prices[$i];
                    $excam->update();
                }else{
                    CampaingProduct::create([
                        'campaign_id'=>$request->camid,
                        'product_id'=>$ex,
                        'price'=>$request->prices[$i],
                    ]);
                };
               
               
                $i++;
            }
        }
        
        notify()->success("Campaing successfully created", "Congratulations");
        return back();
    }
    public function delete($Id){
        $campaign=Campaign::find($Id);
        if (file_exists('uploads/campaign'.$campaign->cover_photo)) {
            unlink('uploads/campaign'.$campaign->cover_photo);
        }
        $campaign->delete();
        notify()->success("Campaing successfully deleted", "Congratulations");
        return back();
    }
    public function deleteComment($Id){
        $campaign=CampaingComment::find($Id);
        $campaign->delete();
        notify()->success("Comment successfully deleted", "Congratulations");
        return back();
    }
    public function remove($Id){
        $campaign=CampaingProduct::find($Id);
      
        $campaign->delete();
        notify()->success("Campaing Product successfully Remove", "Congratulations");
        return back();
    }

    // user section
    public function allCampaing(){
        $campaigns= Campaign::where('status','1')->get();
        return view('frontend.campaing',compact('campaigns'));
    }
    public function campaignProduct($id,Request $request){
        $i=1;
        if ($request->ajax()) {
            $skip=$request->skip;
        }else{
            $skip=0;
        }

        $campaign=Campaign::where('slug',$id)->first();
        $id=$campaign->id;
        $slug=$campaign->slug;
        $campaigns_product= CampaingProduct::where('campaign_id',$id)->get();


        $products = DB::table('products')
                    ->select('*')
                    ->join('campaing_products', 'campaing_products.product_id', 'products.id')
                    ->addselect('campaing_products.price as cprice')
                    ->addselect('campaing_products.id as pid')
                    ->where('campaing_products.campaign_id', $id)
                    ->skip($skip)
                    ->take(15)->get();
        $data = '';
        $data2 = '';
        if ($request->ajax()) {
            if($products->count() > 0){
            foreach ($products as $product) {
                $data .= View::make("components.cam_ajx")
                ->with("product", $product)
                ->render();
               
            }}
            return json_encode(array($data, $data2));;
        }

        return view('frontend.cam_product', compact('products','id','campaigns_product','slug')); 
    }
    public function comment(Request $request){

        CampaingComment::create([
           'comment'=> $request->comment,
           'user_id'=> auth()->id() ?? '0',
           'campaign_id'=> $request->campaign_id
        ]);
        notify()->success("Comment Success  ", "Congratulations");
        return back();
    }
}
