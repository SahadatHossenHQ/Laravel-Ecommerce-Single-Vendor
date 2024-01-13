@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="{{$product->title}}"/>
 
<meta property="og:image" content="{{asset('uploads/product/'.$product->image)}}"/>
 
<meta name='keywords' content="@foreach($product->tags as $tag){{$tag->name.', '}}@endforeach" />
@endpush

@section('title', $product->title)

@push('css')
<link href="https://fonts.cdnfonts.com/css/siyam-rupali" rel="stylesheet">

<link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/flexslider.css">
<link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/image-zoom.css">
  <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
<style>
.get_attri_price+label {
  background: gainsboro;
  padding: 2px 10px;
  margin-right:5px;
  display: inline-block;
  border-radius: 2px;
  cursor:pointer;
  margin-bottom:5px;
}
@media(max-width:500px){
    .heading{
        display:block;
    }
}
input[type="radio"].get_attri_price{
 display: none
}
 input[type="radio"].get_attri_price:checked+label {
  background-color: #333;
  color:#fff
}
    .banner-bootom-w3-agileits{
        font-family: 'Siyam Rupali', sans-serif !important;
        font-family: monospace;
                                                
    }
    
    #specification th{
        width: 160px;
background: #f1f1f1;
    }
    .flexslider .slides img{
        background:white;
    }
    label.btn.active {
        box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
    }
@import url('https://fonts.cdnfonts.com/css/siyam-rupali');
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap');
   .p_title{
    word-spacing: 3px;font-weight: 300;margin-bottom: 14px;color: #333; 
   }
   @media(max-width:767px){
    .new_r{
        display: none;
    }
   }
   .new_r{
    background: #f3f3f3;
margin-top: -20px;
padding-top: 18px;
position: relative;
right: -10px;
   }
   p{
    margin: 0;
   }
   .s_d,.rating1{
    margin-top: 10px;
   }
   .s_d *{
    margin: 0;
   }
    .card {
        position: relative;
        display: flex;
        padding: 0;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: none;
        box-shadow: none;
    }

    .media img {
        width: 50px;
        height: 50px
    }

    .reply a {
        text-decoration: none
    }


    .heading {
        font-size: 25px;
        margin-right: 25px;
    }
    .fa {
        font-size: 25px;
    }
    .checked {
        color: orange;
    }
    /* Three column layout */
    .side {
        float: left;
        width: 15%;
        margin-top: 10px;
    }
    .item_price,del{
         font-family: monospace;font-weight: 600
    }
    .middle {
        float: left;
        width: 70%;
        margin-top: 10px;
    }

    /* Place text to the right */
    .right {
        text-align: right;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* The bar container */
    .bar-container {
        width: 100%;
        background-color: #f1f1f1;
        text-align: center;
        color: white;
    }
   .dropdown .dropdown-menu{
    box-shadow: 0px 0px 5px gainsboro;
    padding: 10px;
   }

    /* Individual bars */
    .bar-5 {width: 60%; height: 18px; background-color: #04AA6D;}
    .bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
    .bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
    .bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
    .bar-1 {width: 15%; height: 18px; background-color: #f44336;}

    /* Responsive layout - make the columns stack on top of each other instead of next to each other */
    @media (max-width: 400px) {
        .side, .middle {
            width: 100%;
        }
        /* Hide the right column on small screens */
        .right {
            display: none;
        }
    }
   
     .rounded-10{
        border-radius: 10px;
    }
     #comment-reply i{
        font-size: 14px;
    }
    .single-right-left p {
  color: #54595F;
  font-size: 18px;
  font-weight: 300;
  line-height: 1.3em;
  margin-top: 10px;
  margin-bottom: 0;
}
</style>
@endpush

@section('content')

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
    
        <!-- //tittle heading -->
        <div class="row" style="background: white;margin-top: 20px;padding: 20px 10px;box-shadow: 0px 4px 6px -3px #9c9c9c;">
            
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider" style="padding: 20px;box-shadow: none;border: 1px solid gainsboro;">
             <style>
                 .video-js{
                     width:100%;
                 }
             </style>
                        <div class="clearfix"></div>
                        <div class="flex-viewport" style="overflow: hidden; position: relative;">
                            <ul class="slides my-gallery" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-1311px, 0px, 0px);">
                                @if($product->yvideo)
                                 <li   data-thumb="{{asset('uploads/product/video/'.$product->video_thumb)}}" style="width: 437px; float: left; display: block;" class="">
                                        <div class="thumb-image">
                                              <iframe  width="100%" style="height:300px;background:black"   src="{{$product->yvideo}}" ></iframe>
                                                 
                       
                                           
                                        </div>
                                    </li>
                                @elseif($product->video)
                                    <li   data-thumb="{{asset('uploads/product/video/'.$product->video_thumb)}}" style="width: 437px; float: left; display: block;" class="">
                                        <div class="thumb-image">
                                             
                                                 
                                                     <video  class="video-js"
    controls
    
    data-setup="{}" controls width="100%" style="height:300px;background:black">
  <source src="{{asset('uploads/product/video/'.$product->video)}}" type="video/mp4">
</video> 
                                           
                                        </div>
                                    </li>
                                @endif
                            
                                @foreach ($product->images as $image)
                                <li data-cl="{{$image->color_attri}}" data-thumb="{{asset('uploads/product/'.$image->name)}}" style="width: 437px; float: left; display: block;" class="">
                                    <div class="thumb-image">
                                         <a class="" href="{{asset('uploads/product/'.$image->name)}}" target="_blank">
                                        <img  src="{{asset('uploads/product/'.$image->name)}}" class="my-gallery-image img-responsive " alt="" draggable="true">
                                         </a>
                                    </div>
                                </li>
                                @endforeach
                                
                               
                            </ul>
                        </div>
                

 
                        <ul class="flex-direction-nav">
                             <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
                             <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
                        </ul>
                   </div>
                  
                </div>
            </div>
            <div class="col-md-5 single-right-left simpleCart_shelfItem">
                <h3 class="p_title">{{$product->title}}</h3>
                <div class="s_d">
                    <p>{!!$product->short_description !!}</p>
                </div>
                <div class="rating1" style="text-align:left !important;">
                    @php
                        if ($product->reviews->count() > 0) {
                            $average_rating = $product->reviews->sum('rating') / $product->reviews->count();
                        } else {
                            $average_rating = 0;
                        }
                    @endphp
                    <div>
                        @if ($average_rating == 0)
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating > 0 && $average_rating < 1.5)
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 1.5 && $average_rating < 2)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 2 && $average_rating < 2.5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 2.5 && $average_rating < 3)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 3 && $average_rating < 3.5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 3.5 && $average_rating < 4)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 4 && $average_rating < 4.5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        @elseif ($average_rating >= 4.5 && $average_rating < 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        @elseif ($average_rating >= 5)
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        @endif
                        <span style="color: #333;">{{$average_rating}} Rating of {{$product->orderDetails->count()}} orders</span> 
                    </div>
                    
                </div>
                <p>
                    Seller:  
                     <a style="font-size: 17px"  href="{{ route('vendor', $product->user->shop_info->slug)}}">{{$product->user->shop_info->name}}</a>
                </p>
                <!-- <p>-->
                <!--    Point : {{$product->point}}-->
                <!--</p>-->
                <p> Brand: <a style="font-size:14px" href="{{route('brand.product',['slug'=>$product->brand->slug])}}">{{$product->brand->name}}</a></p>
                @if($product->book==1)
                 <p> {{$product->book==1 ? 'by':'brand'}} <a style="font-size:14px" href="{{route('author.product',['slug'=>$product->author_id])}}">{{$product->author->name}}</a></p>
                 @endif
                <p >
                    <?php if(isset($campaigns_product)){$product->discount_price=$campaigns_product->price;}?>
                    @if($product->discount_price>0)
                    <span><del>TK.{{$product->regular_price}}</del></span>

                    <span class="item_price">Tk.<span id="dynamic_price">{{$product->discount_price}}</span></span>
                    @php
                    $per= $product->regular_price/100;
                    $amc=$product->regular_price-$product->discount_price;
                    @endphp
                    <span style="font-size:13px">You Save Tk.{{$amc}} ({{round(($amc/$per))}}%)</span>
                    @else
                    <span class="item_price">Tk.<span id="dynamic_price">{{$product->regular_price}}</span></span>
                    @endif
                
                </p>
                <p style="font-size: 13px">
                    <span style="background: green;color: white;border-radius: 50%;width: 20px;height: 20px;display: inline-block;font-size: 13px;line-height: 20px;text-align: center;"><i class="icofont icofont-tick-mark"></i></span> In Stock ({{$product->quantity}} copies available)
                    <p style="margin:0;font-size: 11px;margin-left: 21px;margin-top: 4px;">* স্টক আউট হওয়ার আগেই অর্ডার করুন</p>
                </p>
                
                    <!-- @if($product->whole_price>0)
                      <p class="item_price">Whole Sell :Tk.{{$product->whole_price}}</p>
                    @endif -->
                @if($product->colors->count()!=0)
                <div class="row ml-1">
                    <div class="col-12 pl-0 mb-2">
                        <p><strong>Select Color:</strong></p>
                    </div>
                    
                    <div class="btn-group btn-group-toggle btn-color-group d-block mt-n2 ml-n2" data-toggle="buttons">
                        @foreach ($colors_product as $color)
                      
                            <label class="btn   p-3 m-1 color {{$product->colors->count() == 1 ? 'active':''}}" style="background: {{$color->code}}">
                                @if($product->images)
                                    @foreach ($product->images as $image)
                                        @if($image->color_attri==$color->slug)
                                        <style>
                                            .color{
                                                padding:2px !important;
                                            }
                                        </style>
                                            <img  src="{{asset('uploads/product/'.$image->name)}}" style="height: 70px;width: 70px;object-fit: contain;border: 5px solid white;background: white;" alt="" draggable="true">
                                          @endif
                                    @endforeach
                                @endif
                                <input type="radio" name="color" autocomplete="off" value="{{$color->slug}}" {{$product->colors->count() == 1 ? 'checked':''}}>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                @foreach ($attributes as $attribute)
               
                    <?php 
                            $attribute_prouct = DB::table('attribute_product')
                              ->select('*')
                              ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                              ->addselect('attribute_values.name as vName' )
                              ->addselect('attribute_values.id as vid' )
                              ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                              ->where('attribute_product.product_id', $product->id)
                                ->where('attributes.id', $attribute->id)
                              ->get();
                    ?>
                    @if($attribute_prouct->count() > 0)
                     <div class="row ml-1 mb-2">
                    <div class="col-12 pl-0" style="margin-bottom: 10px;">
                        <p><strong>Select {{$attribute->name}}:</strong></p>
                    </div>

                    @foreach ($attribute_prouct as $attr)
                    <div class="form-checdk" style="display:inine-block">
                        <input id="{{$attr->vName}}" class="form-check-input get_attri_price" type="radio" name="{{$attribute->slug}}" value="{{$attr->vid}}" {{$attribute_prouct->count() == 1 ? 'checked':''}}>
                        <label class="form-check-label" for="{{$attr->vName}}">
                          {{$attr->vName}}
                        </label>
                    </div>
                     
                    @endforeach
                    @push('js')
                    <script>
                        $(document).on('click', 'input[type="radio"][name="{{$attribute->slug}}"]', function(e) {
                            $('input#{{$attribute->slug}}').val(this.value);
                        })
                    </script>
                    @endpush
                     </div>
                    @endif
               
                @endforeach

                @if($product->book!=1 && $product->download_able !=1)
                <td class="invert">
                    <div class="quantity">
                        <div class="quantity-select">
                            <div class="entry value-minus">&nbsp;</div>
                            <input type="text" class="entry value" value="1">
                            <div class="entry value-plus active">&nbsp;</div>
                              <span>@if($product->quantity==0)Out Stock @else ({{$product->quantity}} available) @endif</span>
                        </div>


                    </div>

                </td>
                @endif
                <div class="row" id="response-message">
                    
                </div>
                <div class="row single-product-button" style="padding: 0;margin: 0;">
                        <style>
                .low-warning{
            padding: 8px 30px;
            border-radius: 5px;
            color: white;
            margin-top: 20px;
                }
            </style>
            @if($product->book==1)
            
            <button  style="margin-right:10px;width:140px;margin-top: 10px;color: #008000;border: 1px solid green;text-align: center;border-radius: 5px;line-height: 37px;" type="button" data-toggle="modal" data-target="#exampleModalCenter">
     একটু পড়ে দেখুন 
</button>

          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div style="width: 90% !important;max-width: 90%;" class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <iframe src="https://docs.google.com/gview?url={{asset('/')}}/uploads/admin/book/{{$product->book_file}}&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
                        @endif
                        @if($product->download_able ==1)
                        <style>
                            .gcg{
                                display:none;
                            }
                        </style>
                        @endif
                        @if($product->quantity <= '0')
                         <div class="gcg">
                        @else
                        <div class="occasion-cart gcg" style="width:140px">
                            @endif
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="{{route('add.cart')}}" method="post" id="addToCart">
                                    @csrf
                                    <fieldset>
                                          <?php if(isset($campaigns_product)){?>
                                            <input type="hidden" name="camp" id="camp" value="{{$campaigns_product->id}}">
                                          <?php }?>
                                        <input type="hidden" name="id" id="id" value="{{$product->id}}">
                                        <input type="hidden" name="qty" id="qty" value="1">
                                        <input type="hidden" name="color" id="color" value="blank">
                                        @foreach ($attributes as $attribute)
                                        <?php 
                                            $attribute_prouct = DB::table('attribute_product')->select('*')
                                            ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                                            ->addselect('attribute_values.name as vName' )->addselect('attribute_values.id as vid' )
                                            ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                                            ->where('attribute_product.product_id', $product->id)->where('attributes.id', $attribute->id)->get();
                                        ?>
                                        @if($attribute_prouct->count() > 0)
                                            @foreach ($attribute_prouct as $attr) <?php $vid=$attr->vid;?> @endforeach

                                            <input type="hidden" name="{{$attribute->slug}}" id="{{$attribute->slug}}" value="{{$attribute_prouct->count()== 1? $vid:'blank'}}">
                                        @endif
                                        @endforeach

                                         @if($product->quantity <= '0')
                                        @else
                                        @if($product->sheba!=1)
                                        <button style="width:140px;margin-top: 10px;background:#ff9900;color:white" type="submit" name="submit" class="redirect"><i  class="fal fa-shopping-cart"></i> Add To Cart</button>
                                         
                                        @endif @endif
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                       
                        @if($product->book!=1)
                        <div class="occasion-cart col-1s"  style="width:140px">
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="{{route('buy.product')}}" method="GET">
                                     <?php if(isset($campaigns_product)){?>
                                            <input type="hidden" name="camp" id="camp" value="{{$campaigns_product->id}}">
                                          <?php }?>
                                    <fieldset>
                                         <?php if(isset($campaigns_product)){$product->discount_price=$campaigns_product->price;}?>
                                                @if(!empty($product->discount_price))
                                                <input type="hidden"  name="just" id="just"  value="{{$product->discount_price}}">
                                                <input type="hidden" name="dynamic_price" class="dynamic_price" value="{{$product->discount_price}}">
                                              
                                                @else
                                               <input type="hidden"  name="just" id="just"  value="{{$product->regular_price}}">
                                                 <input type="hidden" name="dynamic_price" class="dynamic_price" value="{{$product->regular_price}}">
                                                @endif
                                        <input type="hidden" name="id" id="id" value="{{$product->id}}">
                                        <input type="hidden" name="qty" id="qty" value="1">
                                        <input type="hidden" name="color" id="color" value="blank">
                                       @foreach ($attributes as $attribute)
                                        <?php 
                                            $attribute_prouct = DB::table('attribute_product')->select('*')
                                            ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                                            ->addselect('attribute_values.name as vName' )->addselect('attribute_values.id as vid' )
                                            ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                                            ->where('attribute_product.product_id', $product->id)->where('attributes.id', $attribute->id)->get();
                                        ?>
                                        @if($attribute_prouct->count() > 0)
                                            @foreach ($attribute_prouct as $attr) <?php $vid=$attr->vid;?> @endforeach

                                            <input type="hidden" name="{{$attribute->slug}}" id="{{$attribute->slug}}" value="{{$attribute_prouct->count()== 1? $vid:'blank'}}">
                                        @endif
                                        @endforeach
                                        @if($product->quantity <= '0')
                                        <input type="hidden" name="pr" value="1">
                                        <!--<input style="width:140px;margin-top: 10px;background: var(--primary_color);color: white;border-color: var(--primary_color);" type="submit" value="Pre Order" class="button">-->
                                        <p style="width:140px;margin-top: 10px;background: #ec1d1d;color: white;border-color: var(--primary_color);text-align: center;padding: 10px;border-radius: 5px;">Out Of Stock</p>
                                        @else
                                       <input style="width:140px;margin-top: 10px;background: var(--primary_color);color: white;border-color: var(--primary_color);" type="submit" value="Buy Now" class="button">
                                       @endif
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        @endif
                </div>
                <style>
                    .share-groups span{
                        width: 30px;
                        height: 30px;
                        display: block;
                        border-radius: 5px;
                        margin: 5px;
                    }
                    .share-groups{
                        display: flex;
                        align-items: center;
                    }
                </style>

                <div style="margin-top: 10px;font-size: 12px;">
                    <div class="dropdown row single-product-button" style="padding: 0;margin: 0;">
                        @php($typeid=$product->slug)
                        @if(App\Models\wishlist::where('user_id',auth()->id())->where('product_id',$product->id)->first())
                        @php($k=App\Models\wishlist::where('user_id',auth()->id())->where('product_id',$product->id)->first())
                          <a class="col-md-6 col-6" style="color:black;padding: 0;" href="{{route('wishlist.remove',['item'=>$k->id])}}" class="redirect"><i class="fal fa-heart-broken" aria-hidden="true"></i> Remove Wishlist</a>
                        @else
                        <form style="padding:0" class="col-md-6 col-6"action="{{route('wishlist.add')}}" method="post" >
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->slug}}"> 
                            <button style="" type="submit" title="Wishlist"><i class="fal fa-heart" aria-hidden="true"></i> Add To Wishlist</button>
                        </form>
                        @endif
                        
                        <div style="padding:0"  class=" dropdown-toggle col-md-6 col-6" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="icofont icofont-share "></i> Share This Item
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <div class="share-groups">
                    <div>Share : </div>
                    <div>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}">
                           <span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(24, 119, 242);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span>
                        </a>
                    </div>
                    <div>
                        <a href="https://twitter.com/intent/tweet?url={{Request::url()}}&text=">
                            <span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(29, 155, 240);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 01-2.828.775 4.93 4.93 0 002.166-2.725 9.738 9.738 0 01-3.13 1.194 4.92 4.92 0 00-3.593-1.55 4.924 4.924 0 00-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 00-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 01-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 004.6 3.42 9.893 9.893 0 01-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 007.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span>
                        </a>
                    </div>
                    <div>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}">
                            <span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 010 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span>
                        </a>
                    </div>
                   <div>
                       <a rel="nofollow noopener" class="a2a_i" href="https://www.addtoany.com/add_to/email?linkurl={{Request::url()}};linknote=" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_email" style="background-color: rgb(1, 102, 255);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M26 21.25v-9s-9.1 6.35-9.984 6.68C15.144 18.616 6 12.25 6 12.25v9c0 1.25.266 1.5 1.5 1.5h17c1.266 0 1.5-.22 1.5-1.5zm-.015-10.765c0-.91-.265-1.235-1.485-1.235h-17c-1.255 0-1.5.39-1.5 1.3l.015.14s9.035 6.22 10 6.56c1.02-.395 9.985-6.7 9.985-6.7l-.015-.065z"></path></svg></span> </a>
                   </div>
                    <div>
                        <a href="https://www.addtoany.com/add_to/whatsapp?linkurl={{Request::url()}}&linknote=">
                            <span class="a2a_svg a2a_s__default a2a_s_whatsapp" style="background-color: rgb(18, 175, 10);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF" d="M16.21 4.41C9.973 4.41 4.917 9.465 4.917 15.7c0 2.134.592 4.13 1.62 5.832L4.5 27.59l6.25-2.002a11.241 11.241 0 005.46 1.404c6.234 0 11.29-5.055 11.29-11.29 0-6.237-5.056-11.292-11.29-11.292zm0 20.69c-1.91 0-3.69-.57-5.173-1.553l-3.61 1.156 1.173-3.49a9.345 9.345 0 01-1.79-5.512c0-5.18 4.217-9.4 9.4-9.4 5.183 0 9.397 4.22 9.397 9.4 0 5.188-4.214 9.4-9.398 9.4zm5.293-6.832c-.284-.155-1.673-.906-1.934-1.012-.265-.106-.455-.16-.658.12s-.78.91-.954 1.096c-.176.186-.345.203-.628.048-.282-.154-1.2-.494-2.264-1.517-.83-.795-1.373-1.76-1.53-2.055-.158-.295 0-.445.15-.584.134-.124.3-.326.45-.488.15-.163.203-.28.306-.47.104-.19.06-.36-.005-.506-.066-.147-.59-1.587-.81-2.173-.218-.586-.46-.498-.63-.505-.168-.007-.358-.038-.55-.045-.19-.007-.51.054-.78.332-.277.274-1.05.943-1.1 2.362-.055 1.418.926 2.826 1.064 3.023.137.2 1.874 3.272 4.76 4.537 2.888 1.264 2.9.878 3.43.85.53-.027 1.734-.633 2-1.297.266-.664.287-1.24.22-1.363-.07-.123-.26-.203-.54-.357z"></path></svg></span>
                        </a>
                    </div>
                    <div>
                       <a rel="nofollow noopener" class="a2a_i" href="https://www.addtoany.com/add_to/facebook_messenger?linkurl={{Request::url()}};linknote=" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_facebook_messenger" style="background-color: rgb(0, 132, 255);"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M16 5C9.986 5 5.11 9.56 5.11 15.182c0 3.2 1.58 6.054 4.046 7.92V27l3.716-2.06c.99.276 2.04.425 3.128.425 6.014 0 10.89-4.56 10.89-10.183S22.013 5 16 5zm1.147 13.655L14.33 15.73l-5.423 3 5.946-6.31 2.816 2.925 5.42-3-5.946 6.31z"></path></svg></span> </a>
                    </div>
                </div>

                    </div>
                </div>
                <div style="margin-top: 10px;">
                    <div class="row single-product-button" style="padding: 0;margin: 0;">
                        <div style="padding:0" class="col-md-6 col-6"><i class="fas fa-truck" aria-hidden="true"></i> 7 Days Happy Return</div>
                        <div style="padding:0" class="col-md-6 col-6"><i class="icofont icofont-cash-on-delivery"></i> Cash On Delivery</div>
                    </div>
                </div>

                
                <div class="row">
                    <!-- <div class="shp-lc3 col-md-12">
                        <div class="shp-lc-4 row">
                            <div class="col-md-4">
                                <i class="fas fa-truck"></i> Home Delivery
                                <p>40 Minutes - 1 Hour</p>
                            </div>
                           <div class="col-md-6">
                                <i class="fas fa-truck"></i> Same Days Returns
                                <p>Change of mind is not applicable</p>
                            </div>
                        </div>
                    </div> -->
                   <!--  <div class="shp-lc3 col-md-6">
                        <div class="shp-lc-4">
                           
                            <div>
                                <i class="fas fa-hand-holding-usd"></i>Warranty not available
                            </div>
                        </div>
                    </div> -->
                   <!--  <div class="shp-lc3 col-md-4">
                        <div class="shp-lc-4">
                            Positive Seller Ratings
                            <h4><b> 86%</b></h4>
                        </div>
                    </div>
                    <div class="shp-lc3 col-md-4">
                        <div class="shp-lc-4">
                            Ship on Time
                            <h4><b> 86%</b></h4>
                        </div>
                    </div>
                    <div class="shp-lc3 col-md-4">
                        <div class="shp-lc-4">
                            Chat Response Rate
                            <h4><b> 86%</b></h4>
                        </div>
                    </div> -->
                    
                    
                   
                </div>
            </div>
        </div>
        <div class="col-md-3 new_r">
            <h3 class="p_title" style="font-size:20px">Related Product</h3>
            <?php 
                         foreach($product->categories as $s){$ppis=$s->id;}
               
                $productIds  = DB::table('category_product')->where('category_id', $ppis)->get()->pluck('product_id');
                $products    = App\Models\Product::whereIn('id', $productIds)->where('status', true)->inRandomOrder()->take(5)->get();
                        ?>
 
                @foreach ($products as $producter)
                      <x-single-related :product="$producter" classes="" />
                @endforeach

        </div>
        </div>
        <br>
        <div class="row" style="background: white; box-shadow: 0px 4px 6px -3px #9c9c9c;">
            <div id="accordion" style="width: 100%;">
                <h4 style="font-size: 20px;padding: 20px;padding-bottom: 10px;">Product Specification & Summary</h4>
                <div class="lc-4">
                    <button class="collapsed" data-toggle="collapse" data-target="#description" aria-expanded="true" aria-controls="description">
                            Summary
                    </button>
                    @if($product->book==1)
                     <button class="collapsed" data-toggle="collapse" data-target="#specification " aria-expanded="false" aria-controls="specification">
                            Specification 
                    </button>
                    <button class="collapsed" data-toggle="collapse" data-target="#author" aria-expanded="false" aria-controls="author">
                            Author 
                    </button>
                    @endif
                    <button class="collapsed" data-toggle="collapse" data-target="#reviews" aria-expanded="false" aria-controls="reviews">
                            Reviews({{$product->reviews->count()}})
                    </button>
                    <button class="collapsed" data-toggle="collapse" data-target="#comments" aria-expanded="false" aria-controls="comments">
                            Ask Question({{$product->comments->where('parent_id',null)->count()}})
                    </button>
                </div>

                <div id="description" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        {!! $product->full_description !!}
                    </div>
                </div>
                 @if($product->book==1)
                <div id="author" class="collapse  " aria-labelledby="headingThrees" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img style="width: 100px;height: 100px;border-radius: 50%;object-fit: cover;" src="{{asset('/')}}/uploads/admin/{{$product->author->img}}">
                            </div>
                            <div class="col-md-9">
                                <h4>{{$product->author->name}}</h4>
                                {!! $product->author->bio !!}
                            </div>
                        </div>
                    </div>
                </div>
                 <div id="specification" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <td>{{$product->title}}</td>
                            </tr>
                             <tr>
                                <th>Author</th>
                                <td>  <a style="font-size:14px" href="{{route('author.product',['slug'=>$product->author_id])}}">{{$product->author->name}}</a> </td>
                            </tr>
                             <tr>
                                <th>Publisher</th>
                                <td> <a style="font-size: 17px"  href="{{ route('vendor', $product->user->shop_info->slug)}}">{{$product->user->shop_info->name}}</a></td>
                            </tr>
                             <tr>
                                <th>ISBN</th>
                                <td>{{$product->isbn}}</td>
                            </tr>
                             <tr>
                                <th>Edition</th>
                                <td>{{$product->edition}}</td>
                            </tr>
                             <tr>
                                <th>Number of Pages</th>
                                <td>{{$product->pages}}</td>
                            </tr>
                             <tr>
                                <th>Country</th>
                                <td>{{$product->country}}</td>
                            </tr>
                             <tr>
                                <th>Language</th>
                                <td>{{$product->language}}</td>
                            </tr>

                        </table>
                    </div>
                </div>
                @endif
                <div id="reviews" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <div class="review">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <span class="heading">Product Rating</span>
                                    
                                    @if ($average_rating == 0)
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating > 0 && $average_rating < 1.5)
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 1.5 && $average_rating < 2)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 2 && $average_rating < 2.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 2.5 && $average_rating < 3)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 3 && $average_rating < 3.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 3.5 && $average_rating < 4)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 4 && $average_rating < 4.5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 4.5 && $average_rating < 5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    @elseif ($average_rating >= 5)
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    @endif
                                    <p>{{$average_rating}} average based on {{$product->reviews->count()}} reviews.</p>
                                    <hr style="border:3px solid #f1f1f1">

                                    <div class="row">
                                        <div class="side">
                                            <div>5 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                            <div class="bar-5"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$product->reviews->where('rating', 5)->count()}}</div>
                                        </div>
                                        <div class="side">
                                            <div>4 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                            <div class="bar-4"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$product->reviews->where('rating', 4)->count()}}</div>
                                        </div>
                                        <div class="side">
                                            <div>3 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                            <div class="bar-3"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$product->reviews->where('rating', 3)->count()}}</div>
                                        </div>
                                        <div class="side">
                                            <div>2 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                            <div class="bar-2"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$product->reviews->where('rating', 2)->count()}}</div>
                                        </div>
                                        <div class="side">
                                            <div>1 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                            <div class="bar-1"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>{{$product->reviews->where('rating', 1)->count()}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="{{$product->reviews->count() > 0 ? 'card':''}}" style="margin-bottom: 20px;">
                                @forelse ($product->reviews as $review)
                                <div class="row mb-2">
                                    <div class="review-head col-1">
                                        @if($review->user->avatar)
                                        <img src="{{$review->user->avatar == 'default.png' ? '/default/default.png':'/uploads/admin/'.$review->user->avatar}}" alt="">
                                        @endif
                                    </div>
                                    <div class="side-2 col-11">
                                        <b>{{$review->user->name}}</b>
                                        <div class="rating1">
                                            @if ($review->rating == 1)
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif ($review->rating == 2)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif ($review->rating == 3)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif ($review->rating == 4)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif ($review->rating == 5)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            @endif
                                            <span style="color: #333;">{{$review->rating}} rating</span>
                                        </div>
                                     
                                        <p style="margin-bottom: 0;">{{$review->body}}</p>
                                        <style type="text/css">
                                            .crv img{
                                                  width: 80px;
height: 80px;
object-fit: cover;
margin: 5px;
border: 2px solid black;
                                            }
                                        </style>
                                        <div class="d-flex crv">
                                        @if($review->file)
                                            <a href="{{asset('/')}}uploads/review/{{$review->file}}">
                                                <img width="100px" src="{{asset('/')}}uploads/review/{{$review->file}}">
                                            </a>
                                        @endif
                                        @if($review->file2)
                                             <a href="{{asset('/')}}uploads/review/{{$review->file2}}">
                                                <img width="100px" src="{{asset('/')}}uploads/review/{{$review->file2}}">
                                            </a>
                                              @endif
                                        @if($review->file3)
                                             <a href="{{asset('/')}}uploads/review/{{$review->file3}}">
                                                <img width="100px" src="{{asset('/')}}uploads/review/{{$review->file3}}">
                                            </a>
                                              @endif
                                        @if($review->file4)
                                             <a href="{{asset('/')}}uploads/review/{{$review->file4}}">
                                                <img width="100px" src="{{asset('/')}}uploads/review/{{$review->file4}}">
                                            </a>
                                              @endif
                                        @if($review->file5)
                                             <a href="{{asset('/')}}uploads/review/{{$review->file5}}">
                                                <img width="100px" src="{{asset('/')}}uploads/review/{{$review->file5}}">
                                            </a>
                                              @endif

                                        </div>
                                           
                                    </div>
                                </div>
                                @empty
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="text-center text-danger">Reviews not available</h3>
                                        </div>
                                    </div>
                                @endforelse
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="comments" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                     <div class="card-body">
                        <div class="container my-2">
                            <div class="{{$product->comments->count() > 0 ? 'card':''}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @forelse ($product->comments->where('parent_id',null) as $comment)
                                                <div class="media mb-4" > 
                                                    <img class="mr-3 rounded-10" alt="Avatar" src="{{$comment->user->avatar == 'default.png' ? '/default/default.png':'/uploads/admin/'.$comment->user->avatar}}" />
                                                    <div class="media-body">
                                                        <div class="row">
                                                            <div class="col-10 d-flex">
                                                                <h5>{{$comment->user->name}}</h5>
                                                            </div>
                                                                @if (auth()->check() && auth()->user()->role_id == 1)
                                                            <div class="col-2 text-right">
                                                                <div class="pull-right reply">
                                                                    @auth
                                                                    <a href="javascript:void(0)" id="comment-reply" data-id="{{$comment->id}}" data-slug="{{$product->slug}}">
                                                                        <span><i class="fa fa-reply"></i> reply</span>
                                                                    </a> 
                                                                    @else 
                                                                    <a href="javascript:void(0)" class="btn disabled">
                                                                        <span><i class="fa fa-reply"></i> reply</span>
                                                                    </a>   
                                                                    @endauth
                                                                    
                                                                </div>
                                                            </div> 
                                                            @endif
                                                            
                                                        </div> 
                                                          <p style="margin-top:-7px"> {{$comment->body}}</p>
                                                        <p style="font-size: 11px;color: #3e3939;">{{$comment->created_at->diffForHumans()}}</p>
                                                        @forelse ($comment->replies as $reply)
                                                        <div class="media mt-4"> 
                                                            <a class="pr-3" href="#">
                                                                <img class="rounded-10" alt="Avatar" src="{{$reply->user->avatar == 'default.png' ? '/default/default.png':'/uploads/admin/'.$reply->user->avatar}}" />
                                                            </a>
                                                            <div class="media-body">
                                                                <div class="row">
                                                                    <div class="col-12 d-flex">
                                                                        <h5>{{$reply->user->name}}</h5>
                                                                    </div>
                                                                </div> 
                                                                  <p style="margin-top:-7px"> {{$reply->body}}</p>
                                                        <p style="font-size: 11px;color: #3e3939;">{{$reply->created_at->diffForHumans()}}</p>
                                                            </div>
                                                        </div>
                                                        @empty
                                                            
                                                        @endforelse
                                                        
                                                        <div class="reply-box"></div>
                                                        
                                                    </div>
                                                </div>
                                                @empty
                                                    <h3 class="text-center text-danger">Questions not available</h3>
                                                @endforelse
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @auth
                        <form style="margin-top: 30px;" action="{{route('comment', $product->slug)}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for=""><b>Type Your Questions Here</b></label>
                                    <textarea style="width: 100%;" class="form-control"  name="comment" id="comment" required></textarea>
                                    @error('comment')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input style="margin-top: 20px;background: var(--primary_color);" type="submit" value="Submit" class="button">
                                </div>
                            </div>
                        </form>
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
       
        <br>
         <div class="products related row" style="background: white;
box-shadow: 0px 4px 6px -3px #9c9c9c;margin-right: -15px;;margin-left: -15px;">
                    <div class="container">
                        <h3 class="p_title" style="font-size:20px;padding-top: 20px;">Similar Category Best</h3>
                       <?php 
                         foreach($product->categories as $s){$ppis=$s->id;}
               
                $productIds  = DB::table('category_product')->where('category_id', $ppis)->get()->pluck('product_id');
                $products    = App\Models\Product::whereIn('id', $productIds)->where('status', true)->inRandomOrder()->take(18)->get();
                        ?>

                        <div class="row autoplay">
                            @forelse ($products as $product)
                                <x-product-grid-view :product="$product" classes="" />
                            @empty
                                <x-product-empty-component />
                            @endforelse
                            
                        </div>
                    </div>
                </div>
        <div class="clearfix"> </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{asset('/')}}assets/frontend/js/jquery.flexslider.js"></script>
<script src="{{asset('/')}}assets/frontend/js/image-zoom.js"></script>
<script src="{{asset('/')}}assets/frontend/js/toast.min.js"></script>
  <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

@auth
    <script>
        $(document).ready(function () { 
            $('.dropdown-toggle').dropdown();
            $(document).on('click', '#comment-reply', function(e) {
                e.preventDefault();

                var replyBox = document.getElementsByClassName("reply-box");
                for (var i = 0; i < replyBox.length; i++) {
                    $(replyBox[i]).empty();
                }
                let id   = $(this).data('id');
                let slug = $(this).data('slug');
                let children = $(this).parent().parent().parent().parent().find('.reply-box');
                let url = '/product/comment/reply/'+slug+'/'+id
                let csrf = $('meta[name="csrf-token"]').attr('content')
                let html = '<div class="media mt-4">';
                html += '<div class="media-body">';
                html += '<form action="'+url+'" method="post">';
                html += '<input type="hidden" name="_token" value="'+csrf+'">';
                html += '<div class="form-group">';
                html += '<label for="reply">Reply</label>';
                html += '<input required type="text" name="reply" id="reply" class="form-control" placeholder="Write comment reply">';
                html += '<small class="form-text text-danger"></small>';
                html += '</div>';
                html += '<div class="form-group text-right">';
                html += '<button type="submit" class="btn btn-success">Submit</button>';
                html += '</div>';
                html += '</form>';
                html += '</div>';
                html += '</div>';

                $(children).html(html);
            })
        });
    </script>
@endauth

<script>
    $(document).ready(function () {

        // Can also be used with $(document).ready()
       
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails",
                 slideshow: false
            });
     

        
        $(document).on('click', '.color', function(e) {
            $('.color').removeClass('active');
            $(this).addClass('active');
            let value = $(this).children('input[name="color"]').val();
            $('input#color').val(value);
            var qnt =   $('input#qty').val();
            let product =$('input#id').val();
            let dynamic_price =$('input.dynamic_price').val();
             let formData = $('#addToCart').serialize();

             
            $.ajax({
                    type: 'POST',
                    url: '/get/color/price',
                    data:formData,
                    dataType: "JSON",
                    success: function (response) {
                       $('#dynamic_price').html(response);
                       $('.dynamic_price').val(response);
                       $('#just').val(response*qnt);
                    }
                });
                const targetLi = document.getElementById(value);
            targetLi.click();
        });
         $(document).on('click', '.get_attri_price', function(e) {
        
            let formData = $('#addToCart').serialize();
              var qnt =   $('input#qty').val();
            $.ajax({
                    type: 'POST',
                    url: '/get/attr/price',
                    data: formData,
                    dataType: "JSON",
                    success: function (response) {
                       $('#dynamic_price').html(response);
                       $('.dynamic_price').val(response);
                         $('#just').val(response);
                    }
                });
        });

        

        $('.value-plus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.val(), 10) + 1;
            divUpd.val(newVal);
            $('input#qty').val(newVal);
            var just =$('#just').val();
              $('#dynamic_price').html(just*newVal);
        });

        $('.value-minus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.val(), 10) - 1;
            if (newVal >= 1) {
                divUpd.val(newVal);
                $('input#qty').val(newVal);
                            var just =$('#just').val();
              $('#dynamic_price').html(just*newVal);
            }
            
        });

        $(document).on('submit', '#addToCart', function(e) {
            e.preventDefault();
            
            let url      = $(this).attr('action');
            let type     = $(this).attr('method');
            let formData = $(this).serialize();

            $.ajax({
                type: type,
                url: url,
                data: formData,
                dataType: 'JSON',
                success: function (response) {
                    let message = '<div class="col-12 mt-2">';
                    if(response.alert=='Warning'){
                    message += '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                }else{
                     message += '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                }
                    message += '<strong>'+response.alert+' </strong> '+response.message;
                    message += '</div>';
                    message += '</div>';
                    
                    $('span#total-cart-amount').text(response.subtotal);
                    $('#response-message').html(message);
                    setInterval(() => {
                        $('#response-message').empty();
                    }, 4000);
                },
                error: function(xhr) {
                    let message = '<div class="col-12 mt-2">';
                    message += '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    message += '<strong>Oops!! </strong>'+xhr.statusText;
                    message += '</div>';
                    message += '</div>';

                    $('#response-message').html(message);
                    setInterval(() => {
                        $('#response-message').empty();
                    }, 6000);
                }
            });
        })
    });
    
</script>
<script type="text/javascript">
        $(document).ready(function(){
           
        
// Create a media condition that targets viewports at least 768px wide
const mediaQuery = window.matchMedia('(min-width: 768px)')
// Check if the media query is true
if (mediaQuery.matches) {
  $('.my-gallery-image').each(function(){
                $(this).imageZoom({zoom : 200});
            });
}




        });
    </script>
@endpush