@extends('layouts.admin.e-commerce.app')

@section('title', 'Product Information')

@section('content')
<style type="text/css">
    
    .banner-bootom-w3-agileits{
        font-family: 'Siyam Rupali', sans-serif !important;
        font-family: monospace;
                                                
    }
    .form-check{
        margin-right: 10px !important;
    }
    #specification th{
        width: 160px;
background: #f1f1f1;
    }
    label.btn.rounded-circle.active {
        box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
    }
@import  url('https://fonts.cdnfonts.com/css/siyam-rupali');
    @import  url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap');
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
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Show Product</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        Product Details
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('product/'.$product->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('product')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class="col-12">
                        <img src="{{asset('uploads/product/'.$product->image)}}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active">
                            <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                        </div>
                        @foreach ($product->images as $image)
                            <div class="product-image-thumb active">
                                <img src="{{asset('uploads/product/'.$image->name)}}" alt="Product Image">
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$product->title}}</h3>
                    <p>{{$product->short_description}}</p>

                    <hr>
                    <h4>Available Colors</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach ($colors_product as $color)
                            <label class="btn btn-default text-center active">
                                {{$color->name}}
                                <br>
                                <i class="fas fa-circle fa-2x" style="color: {{$color->code}}"></i>
                                <br>
                                 Price:{{$color->price}}---Qnty:{{$color->qnty}}
                            </label>
                        @endforeach
                        
                    </div>
                     @foreach ($attributes as $attribute)
                    <h4 class="mt-3">Available {{$attribute->name}}</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                         <?php 
                            $attribute_prouct = DB::table('attribute_product')
                              ->select('*')
                              ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                              ->addselect('attribute_values.name as vName' )
                              ->addselect('attribute_product.id as vid' )
                              ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                              ->where('attribute_product.product_id', $product->id)
                                ->where('attributes.id', $attribute->id)
                              ->get();
                        ?>
                        @foreach($attribute_prouct  as $pro_color)
                        <label class="btn btn-default text-center active">
                            {{$pro_color->vName}}
                            <br>
                             Price:{{$pro_color->price}}---Qnty:{{$pro_color->qnty}}
                        </label>
                        @endforeach 
                    </div>
                    @endforeach
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h4 class="mb-0">
                          Regular Price: {{$product->regular_price}}
                        </h4>
                        <h4 class="mt-0">
                          <small>Discount Price: {{$product->discount_price}} </small>
                        </h4>
                        <h4 class="mt-0">
                            <small>
                                Shipping Charge:
                                @if ($product->shipping_charge)
                                    Dummy
                                @else
                                    Free
                                @endif
                            </small>
                        </h4>
                        <h4 class="mt-0"><small>Quantity: {{$product->quantity}}</small> </h4>
                        <h4 class="mt-0">
                            <small>Stock: 
                                @if ($product->quantity > 0)
                                    Available
                                @else
                                    Unavailable
                                @endif 
                            </small>
                        </h4>
                        @isset($product->brand->name)
                            <h4 class="mt-0"><small>Brand: {{$product->brand->name}}</small></h4>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                        <a class="nav-item nav-link" id="product-categories-tab" data-toggle="tab" href="#product-categories" role="tab" aria-controls="product-categories" aria-selected="false">Categories</a>
                        <a class="nav-item nav-link" id="product-sub-categories-tab" data-toggle="tab" href="#product-sub-categories" role="tab" aria-controls="product-sub-categories" aria-selected="false">Sub Categories</a>
                        <a class="nav-item nav-link" id="product-tags-tab" data-toggle="tab" href="#product-tags" role="tab" aria-controls="product-tags" aria-selected="false">Tags</a>
                        @if ($product->downloads->count() > 0)
                        <a class="nav-item nav-link" id="product-downloads-tab" data-toggle="tab" href="#product-downloads" role="tab" aria-controls="product-downloads" aria-selected="false">Downloadable Files</a>
                        @endif
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent" style="width:100%">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                        {!! $product->full_description !!}
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
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
                                                           <div class="col-2">
                                                               <a class="btn btn-danger" href="{{route('admin.comment',$comment->id)}}">Delete</a>
                                                           </div>
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
                                                                    <div class="col-10 d-flex">
                                                                        <h5>{{$reply->user->name}}</h5>
                                                                    </div>
                                                                    <div class="col-2">
                                                               <a class="btn btn-danger" href="{{route('admin.comment',$reply->id)}}">Delete</a>
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
                                                    <h3 class="text-center text-danger">Comments not available</h3>
                                                @endforelse
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        
                    </div>
                    </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        <div class="{{$product->reviews->count() > 0 ? 'card':''}}" style="margin-bottom: 20px;">
                                @forelse ($product->reviews as $review)
                                <div class="row mb-2">
                                    <div class="review-head col-1">
                                        @if($review->user->avatar)
                                        <img src="{{$review->user->avatar == 'default.png' ? '/default/default.png':'/uploads/admin/'.$review->user->avatar}}" alt="">
                                        @endif
                                    </div>
                                    <div class="side-2 col-11">
                                      <div class="d-flex">
                                          <b>{{$review->user->name}}</b>
                                                               <a class="btn btn-danger" href="{{route('admin.rating',$review->id)}}">Delete</a><a class="btn btn-warning" href="{{route('admin.rating.edit',$review->id)}}">Edit</a>
                                      </div>

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
                    <div class="tab-pane fade" id="product-categories" role="tabpanel" aria-labelledby="product-categories-tab">
                        @forelse ($product->categories as $category)
                            
                            @if ($product->categories->last()->id == $category->id)
                                <strong>{{$category->name}}</strong>
                            @else
                                <strong>{{$category->name}},</strong>
                            @endif
                        @empty
                            <strong>Not Available</strong>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="product-sub-categories" role="tabpanel" aria-labelledby="product-sub-categories-tab">
                        @forelse ($product->sub_categories as $sub_category)
                            
                            @if ($product->sub_categories->last()->id == $sub_category->id)
                                <strong>{{$sub_category->name}}</strong>
                            @else
                                <strong>{{$sub_category->name}},</strong>
                            @endif
                        @empty
                            <strong>Not Available</strong>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="product-tags" role="tabpanel" aria-labelledby="product-tags-tab">
                        @forelse ($product->tags as $key => $tag)
                            
                            @if ($product->tags->last()->id == $tag->id)
                                <strong>{{$tag->name}}</strong>
                            @else
                                <strong>{{$tag->name}},</strong>
                            @endif
                            
                        @empty
                            <strong>Not Available</strong>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="product-downloads" role="tabpanel" aria-labelledby="product-downloads-tab">
                        @foreach ($product->downloads as $key => $download)
                            <div class="mb-3">
                                <p><strong>File Name: </strong><a href="">{{$download->name}}</a></p>
                                @if ($download->url != NULL)
                                    <p><strong>File URL: </strong><a href="">{{$download->url}}</a></p>
                                @else
                                    <p><strong>File URL: </strong><a href="">{{asset('uploads/product/download/'.$download->url)}}</a></p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->

@endsection