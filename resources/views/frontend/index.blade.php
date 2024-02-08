@extends('layouts.frontend.app')
@push('meta')
<meta property="og:image" content="{{asset('uploads/setting/'.setting('auth_logo'))}}" />
@endpush
@section('title','' )

@section('content')
@php
$pop=App\Models\Slider::where('is_pop','1')->orderBy('id','desc')->first() ;
@endphp


@if (setting('SLIDER_LAYOUT_STATUS') != 0 || setting('SLIDER_LAYOUT_STATUS') == "")
@if (!empty(setting('SLIDER_LAYOUT')))
<!--================ slider Area =================-->
@include('frontend.partial.slider_style_' . setting('SLIDER_LAYOUT'))
@else
@include('frontend.partial.slider_style_1')
<!--================ / slider Area =================-->
@endif
@endif


@if (setting('BELOW_SLIDER_HTML_CODE_STATUS') != 0 || setting('BELOW_SLIDER_HTML_CODE_STATUS') == "")
<!--================ CUSTOM HTML BELOW SLIDER =================-->
@php
echo setting('BELOW_SLIDER_HTML_CODE');
@endphp
<!--================ / CUSTOM HTML BELOW SLIDER =================-->
@endif


@if (setting('NOTICE_STATUS') != 0 || setting('NOTICE_STATUS') == "")
<!--================ CUSTOM NOTICE =================-->
<br>
<section class="container">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-header">
            New Updates
        </div>
        <div class="card-body">
            @php
            echo setting('CUSTOM_NOTICE');
            @endphp
        </div>
    </div> 
</div>
</div>
</section>
<br>
<!--================ / CUSTOM NOTICE =================-->
@endif







@if (setting('TOP_CAT_STATUS') != 0 || setting('TOP_CAT_STATUS') == "")
<!--================ top category Area =================-->
@if (setting('TOP_CAT'))
<div class="container mt-3"><h3 class="title  col-md-12"><span>{{ setting('TOP_CAT') }}</span> <a href="#"></a></h3></div>
@endif
<div class="shop-category oc" style="padding-bottom: 10px;text-align: center;">
    <div class="container">
        <div class="cat-row">
            @foreach ($categories_f as $category)
            <a href="{{route('category.product',$category->slug)}}" class="cat-item">
                <div class="">
                    <div class="thumbnail">
                        <img src="{{asset('uploads/category/'.$category->cover_photo)}}" alt="">
                    </div>
                    <h3>{{$category->name}}</h3>
                </div>
            </a>
            @endforeach
            @foreach ($mini_f as $category)
            <a href="{{route('miniCategory.product',$category->slug)}}" class="cat-item">
                <div class="">
                    <div class="thumbnail">
                        <img src="{{asset('uploads/mini-category/'.$category->cover_photo)}}" alt="">
                    </div>
                    <h3>{{$category->name}}</h3>
                </div>
            </a>

            @endforeach
            @foreach ($sub_f as $category)
            <a href="{{route('subCategory.product',$category->slug)}}" class="cat-item">
                <div class="">
                    <div class="thumbnail">
                        <img src="{{asset('uploads/sub category/'.$category->cover_photo)}}" alt="">
                    </div>
                    <h3>{{$category->name}}</h3>
                </div>
            </a>

            @endforeach

        </div>
    </div>
</div>
<style>
    .shop-brand.shop-category .cat-row .cat-item img {
        width: 100%;
        height: 100px;
        padding: 0;
    }

    .shop-brand .title {
        text-align: left;
    }
</style>
<!--================ / top category  Area start =================-->
@endif



@if (setting('HERO_SLIDER_1') != 0 || setting('HERO_SLIDER_1') == "")
<style>
    .slick-slides {
        display: none;
    }

    .slick-initialized.slick-slides {
        display: block;
    }
</style>
@if (setting('HERO_SLIDER_1_TEXT'))
<div class="container mt-3"><h3 class="title  col-md-12"><span>{{ setting('HERO_SLIDER_1_TEXT') }}</span> <a href="#"></a></h3></div>
@endif
<section class="hero-2 mr-40 m-hide">
    <div class="container">
        <div class="wp">
            <div class=" autoplay2 slick-slides">
                @foreach ($sliders_f as $key => $slider_f)
                <div class="">
                    <a href="{{$slider_f->url}}">
                        <img src="{{asset('uploads/slider/'.$slider_f->image)}}" alt="">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

@if (setting('SELLER_STATUS') != 0 || setting('SELLER_STATUS') == "")
<!--================ Seller Area =================-->
<br>
<div class="malls">
    <div class="container">
        <h3 class="title  col-md-12"><span>Sellers</span> <a href="{{route('vendors')}}">view all</a></h3>
        <div class="row autoplay slick-slides ">
            @foreach ($shops as $shop)
            <div class="mall">
                <div class="mall-wrapper">
                    <a href="{{route('vendor', $shop->slug)}}">
                        <div class="cover">
                            <img src="{{asset('uploads/shop/cover/'.$shop->cover_photo)}}" alt="Cover Photo">
                        </div>
                        <div class="profile-d" style="background: white;">
                            <img src="{{asset('uploads/shop/profile/'.$shop->profile)}}" alt="">
                            <p>{{$shop->name}}</p>
                        </div>
                        <div class="overly"></div>
                    </a>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!--================ / Seller Area ===============-->
@endif

<!--================ Campaign Area ===============-->
{{-- @foreach($campaigns_product as $campain)
<style>
    .camppp.products .slick-list {
        padding-bottom: 80px;
    }
</style>
<div class="products camppp">
    <div class="container">
        <div class="row" style="margin:-10px;margin-bottom:10px;background: white;border-radius: 5px;padding: 10px;">
            <h3 class="title col-md-12" style="margin: 0 !important;border: none;"><span style="">{{$campain->name}}
                    Sell</span> : <span style="background: #ec0313;padding: 8px;color: white;" class="ends"
                    id="demo{{$campain->id}}"></span> <a
                    href="{{route('campaing.product',['slug'=>$campain->slug])}}">View All</a></h3>
        </div>
        <script>
            // Set the date we're counting down to
            var countDownDate {
                {
                    $campain - > id
                }
            } = new Date("<?php echo $mdate=$campain->end?>").getTime();

            // Update the count down every 1 second
            var x {
                    {
                        $campain - > id
                    }
                } = setInterval(function () {

                        // Get today's date and time
                        var now {
                            {
                                $campain - > id
                            }
                        } = new Date();
                        // Find the distance between now and the count down date
                        var distance {
                            {
                                $campain - > id
                            }
                        } = countDownDate {
                            {
                                $campain - > id
                            }
                        } - now {
                            {
                                $campain - > id
                            }
                        };

                        // Time calculations for days, hours, minutes and seconds
                        var days {
                                {
                                    $campain - > id
                                }
                            } = Math.floor(distance {
                                    {
                                        $campain - > id
                                    }
                                }
                                / (1000 * 60 * 60 * 24));
                                var hours {
                                    {
                                        $campain - > id
                                    }
                                } = Math.floor((distance {
                                    {
                                        $campain - > id
                                    }
                                } % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                var minutes {
                                    {
                                        $campain - > id
                                    }
                                } = Math.floor((distance {
                                    {
                                        $campain - > id
                                    }
                                } % (1000 * 60 * 60)) / (1000 * 60));
                                var seconds {
                                    {
                                        $campain - > id
                                    }
                                } = Math.floor((distance {
                                    {
                                        $campain - > id
                                    }
                                } % (1000 * 60)) / 1000);

                                // Display the result in the element with id="demo"
                                document.getElementById("demo{{$campain->id}}").innerHTML = days {
                                    {
                                        $campain - > id
                                    }
                                } + "d " + hours {
                                    {
                                        $campain - > id
                                    }
                                } + "h " +
                                minutes {
                                    {
                                        $campain - > id
                                    }
                                } + "m " + seconds {
                                    {
                                        $campain - > id
                                    }
                                } + "s ";

                                // If the count down is finished, write some text
                                if (distance {
                                        {
                                            $campain - > id
                                        }
                                    } < 0) {
                                    clearInterval(x {
                                        {
                                            $campain - > id
                                        }
                                    });
                                    document.getElementById("demo{{$campain->id}}").innerHTML = "EXPIRED";
                                }
                            },
                            1000);
        </script>

        <div class="row autoplay slick-slides">
            @foreach ($campain->campaing_products->where('status',0)->take(6) as $cam_products)
            <?php $product=$cam_products->cam_products; ?>
            <div class="product">
            <?php $typeid=$product->slug; ?>
            <div class="product-wrapper" @if(setting('is_point')==1) style="height: 310px;" @endif>
                <div class="pin">
                    <div class="thumbnail">
                        <a href="{{route('product.cam.details', $cam_products->id)}}">
                            <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                        </a>
                    </div>
                    <div class="details" style="padding-top:0 !important">
                        <div class="rating1" style="font-size:12px;text-align: left;">
                            @php
                            $hw=App\Models\wishlist::where('product_id',
                            $product->id)->where('user_id',auth()->id())->first();
                            if($hw){
                            $color='#54c8ec';
                            }else{
                            $color='#a2acb5';
                            }
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
                                @elseif ($average_rating > 0 && $average_rating < 1.5) <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif ($average_rating >= 1.5 && $average_rating < 2) <i class="fas fa-star">
                                        </i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif ($average_rating >= 2 && $average_rating < 2.5) <i class="fas fa-star">
                                            </i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif ($average_rating >= 2.5 && $average_rating < 3) <i
                                                class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif ($average_rating >= 3 && $average_rating < 3.5) <i
                                                    class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif ($average_rating >= 3.5 && $average_rating < 4) <i
                                                        class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star-half-alt"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif ($average_rating >= 4 && $average_rating < 4.5) <i
                                                            class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif ($average_rating >= 4.5 && $average_rating < 5) <i
                                                                class="fas fa-star"></i>
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
                                                                <!-- <span style="color: #333;display: inline-block;">({{$average_rating}})</span> -->
                            </div>
                        </div>
                        <a href="{{route('product.cam.details', $cam_products->id)}}">
                            <h5>{{$product->title}}</h5>
                        </a>

                        <h6><strong
                                style="color: var(--primary_color)">৳{{$cam_products->price ?? $product->discount_price ?? $product->regular_price}}</strong>
                            @if($cam_products->price>0 || $product->discount_price>0)
                            <del>৳{{$product->regular_price}}</del></h6>
                        @endif

                    </div>
                    <div class="quick-view"> <a href="{{route('product.cam.details', $cam_products->id)}}"><i
                                class="icofont icofont-search"></i> Quick View</a></div>
                </div>
                @php
                $hw=App\Models\wishlist::where('product_id', $product->id)->where('user_id',auth()->id())->first();
                if($hw){
                $color='#54c8ec';
                }else{
                $color='#a2acb5';
                }
                @endphp
                <div class="home-add2 d-block" style="display:block !important">


                    <div class="cbtn d-block">
                        @if($product->quantity <= '0' ) <a href="{{route('product.details', $product->slug)}}"
                            class="redirect" style="margin-top: 10px;background: red;color: white;border-color: red;">
                            Pre Order </a>
                            @else
                            <button type="submit" class="redirect" style="margin-top: 10px;"
                                data-url="{{route('camp.product.info', $cam_products->id)}}" id="productInfo1"
                                type="submit" title="Add To Cart"><i class="fal fa-shopping-cart"
                                    aria-hidden="true"></i> </button>
                            @endif
                            <form action="{{route('wishlist.add')}}" method="post" id="submit_payment_form{{$typeid}}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->slug}}">
                                <button style="margin-top: 5px;background:{{$color}}" class="redirect" type="submit"
                                    title="Wishlist"><i class="fal fa-heart" aria-hidden="true"></i> </button>
                            </form>
                    </div>
                </div>
            </div>
            </div>
            @push('js')
            <script>
                // form submit 
                $(document).on('submit', '#submit_payment_form{{$typeid}}', function (e) {
                    e.preventDefault();

                    let action = $(this).attr('action');
                    var formData = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: action,
                        data: formData,
                        dataType: "JSON",
                        beforeSend: function () {
                            loader(true);
                        },
                        success: function (response) {
                            responseMessage(response.alert, response.message, response.alert
                                .toLowerCase())
                        },
                        complete: function () {
                            loader(false);
                        },
                        error: function (xhr) {
                            if (xhr.status == 422) {
                                if (typeof (xhr.responseJSON.errors) !== 'undefined') {

                                    $.each(xhr.responseJSON.errors, function (key, error) {
                                        $('small.' + key + '').text(error);
                                        $('#' + key + '').addClass('is-invalid');
                                    });
                                    responseMessage('Error', xhr.responseJSON.message, 'error')
                                }

                            } else if (xhr.status == 401) {
                                alert('please login');
                                window.location = '/login';

                            } else {
                                responseMessage(xhr.status, xhr.statusText, 'error')
                            }
                        }
                    });
                });

                // response message hande
                function responseMessage(heading, message, icon) {
                    $.toast({
                        heading: heading,
                        text: message,
                        icon: icon,
                        position: 'top-right',
                        stack: false
                    });
                }

                // loader handle this function
                function loader(status) {
                    if (status == true) {
                        $('#loading-image').removeClass('d-none').addClass('d-block');

                    } else {
                        $('#loading-image').addClass('d-none').removeClass('d-block');
                    }
                }
            </script>
            @endpush

            @endforeach

        </div>
    </div>
</div>
@endforeach --}}
<!--================ / Campaign Area ===============-->

@if (setting('LATEST_PRODUCT_STATUS') != 0 || setting('LATEST_PRODUCT_STATUS') == "")
<!--================ Latest product Area =================-->
<div class="products">
    <div class="container">
        <h3 class="title"><span>Latest Products</span> <a href="{{route('product')}}">View All</a></h3>
        <div class="row  ">
            @forelse ($products as $product)
            <x-product-grid-view :product="$product" classes="product col-lg-2 col-md-3 col-sm-4 col-4" />
            @empty
            <x-product-empty-component />
            @endforelse
        </div>
    </div>
</div>
<!--================ / Latest product Area =================-->
@endif

@if (setting('FEATURE_PRODUCT_STATUS') != 0 || setting('FEATURE_PRODUCT_STATUS') == "")
<!--================ Feature product Area =================-->
<div class="products">
    <div class="container">
        <h3 class="title"><span>Featured Products</span> <a href="{{route('product')}}">View All</a></h3>
        <div class="row autoplay slick-slides">
            @forelse ($randomProducts as $randomProduct)
            <x-product-grid-view :product="$randomProduct" classes="" />
            @empty
            <x-product-empty-component />
            @endforelse
        </div>
    </div>
</div>
<!--================ / Feature product Area =================-->
@endif


@if (setting('HERO_SLIDER_2') != 0 || setting('HERO_SLIDER_2') == "")
<style>
    .clss.products .slick-list {
        padding-bottom: 20px !important;
    }
    .hc img {
        margin-bottom: 22px;
        padding: 0 !important;
    }
</style>
<section class="hero-2 hc">
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @foreach (App\Models\Slider::where('status',1)->where('is_sub',1)->take(2)->get() as $key =>
                    $slider)
                    <div class="">
                        <a href="{{$slider->url}}">
                            <img width="100%" src="{{asset('uploads/slider/'.$slider->image)}}" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    @foreach (App\Models\Slider::where('status',1)->where('is_sub',1)->skip(2)->take(1)->get() as $key
                    => $slider)
                    <div class="">
                        <a href="{{$slider->url}}">
                            <img width="100%" src="{{asset('uploads/slider/'.$slider->image)}}" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    @foreach (App\Models\Slider::where('status',1)->where('is_sub',1)->skip(3)->take(2)->get() as $key
                    => $slider)
                    <div class="">
                        <a href="{{$slider->url}}">
                            <img width="100%" src="{{asset('uploads/slider/'.$slider->image)}}" alt="">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if (setting('CLASSIFIED_SELL_STATUS') != 0 || setting('CLASSIFIED_SELL_STATUS') == "")
@if($unproducts->count()>0)
<br>
<div class="products clss">
    <div class="container">
        <h3 class="title"><span>Classified Sell</span> <a href="{{route('clasified.all')}}">View All</a></h3>
        <div class="row autoplay slick-slides">
            @foreach ($unproducts as $unproduct)
            <div class="product ">
                <div class="product-wrapper" style="height:230px">
                    <div class="pin">
                        <div class="thumbnail">
                            <a href="{{route('clasified.show',['slug'=>$unproduct->slug])}}">
                                <img src="{{asset('uploads/product/'.$unproduct->thumbnail)}}" alt="Product Image">
                            </a>
                        </div>
                        <div class="details">
                            <a href="{{route('clasified.show',['slug'=>$unproduct->slug])}}">
                                <h5>{{$unproduct->title}}</h5>
                            </a>
                            <h6><strong style="color: var(--primary_color)">৳{{$unproduct->price}}</strong></h6>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@endif

@if (setting('MEGA_CAT_PRODUCT_STATUS') != 0 || setting('MEGA_CAT_PRODUCT_STATUS') == "")
@if(!empty(setting('mega_cat')))
@foreach(json_decode(setting('mega_cat')) as $c)
@php
$cat =DB::table('categories')->where('id',$c)->first();
$productIds = DB::table('category_product')->where('category_id', $c)->get()->pluck('product_id');
$products = \App\Models\Product::whereIn('id', $productIds)->take(6)->where('status',1)->get();
@endphp
@if($cat)
@if($products->count()>0)
    <div class="products">
        <div class="container">
            <h3 class="title"><span>{{$cat->name}} </span><a href="{{route('category.product',$cat->slug)}}">View All</a>
            </h3>
            <div class="row autoplay slick-slides">
                @forelse ($products as $product)
                <x-product-grid-view :product="$product" classes="" />
                @empty
                <x-product-empty-component />
                @endforelse

            </div>
        </div>
    </div>
@endif
@endif
@endforeach
@endif
@endif

@if (setting('SUB_CAT_PRODUCT_STATUS') != 0 || setting('SUB_CAT_PRODUCT_STATUS') == "")
@if(!empty(setting('sub_cat')))
@foreach(json_decode(setting('sub_cat')) as $c)
@php
$cat =DB::table('sub_categories')->where('id',$c)->first();
$productIds = DB::table('product_sub_category')->where('sub_category_id', $c)->get()->pluck('product_id');
$products = \App\Models\Product::whereIn('id', $productIds)->where('status',1)->take(6)->get();
@endphp
@if($cat)
@if($products->count()>0)
<div class="products">
    <div class="container">
        <h3 class="title"><span>{{$cat->name}}</span> <a href="{{route('subCategory.product',$cat->slug)}}">View All</a>
        </h3>
        <div class="row autoplay slick-slides">
            @forelse ($products as $product)
            <x-product-grid-view :product="$product" classes="" />
            @empty
            <x-product-empty-component />
            @endforelse

        </div>
    </div>
</div>
@endif
@endif
@endforeach
@endif
@endif


@if (setting('MINI_CAT_PRODUCT_STATUS') != 0 || setting('MINI_CAT_PRODUCT_STATUS') == "")
@if(!empty(setting('mini_cat')))
@foreach(json_decode(setting('mini_cat')) as $c)
@php
$cat =DB::table('mini_categories')->where('id',$c)->first();
$productIds = DB::table('mini_category_product')->where('mini_category_id', $c)->get()->pluck('product_id');
$products = \App\Models\Product::whereIn('id', $productIds)->where('status',1)->take(6)->get();
@endphp
@if($cat)
@if($products->count()>0)
<div class="products">
    <div class="container">
        <h3 class="title"><span>{{$cat->name}} </span> <a href="{{route('miniCategory.product',$cat->slug)}}">View
                All</a></h3>
        <div class="row autoplay slick-slides">
            @forelse ($products as $product)
            <x-product-grid-view :product="$product" classes="" />
            @empty
            <x-product-empty-component />
            @endforelse

        </div>
    </div>
</div>
@endif
@endif
@endforeach
@endif
@endif

@if (setting('EXTRA_CAT_PRODUCT_STATUS') != 0 || setting('EXTRA_CAT_PRODUCT_STATUS') == "")
@if(!empty(setting('extra_cat')))
@foreach(json_decode(setting('extra_cat')) as $c)
@php
$cat =DB::table('extra_mini_categories')->where('id',$c)->first();
$productIds = DB::table('extra_mini_category_product')->where('extra_mini_category_id', $c)->get()->pluck('product_id');
$products = \App\Models\Product::whereIn('id', $productIds)->where('status',1)->take(6)->get();
@endphp
@if($cat)
@if($products->count()>0)
<div class="products">
    <div class="container">
        <h3 class="title"><span>{{$cat->name}}</span> <a href="{{route('extraCategory.product',$cat->slug)}}">View
                All</a></h3>
        <div class="row autoplay slick-slides">
            @forelse ($products as $product)
            <x-product-grid-view :product="$product" classes="" />
            @empty
            <x-product-empty-component />
            @endforelse

        </div>
    </div>
</div>
@endif
@endif
@endforeach
@endif
@endif


@if (setting('BRAND_STATUS') != 0 || setting('BRAND_STATUS') == "")
<!--================product  Area start=================-->
<div class="shop-category shop-brand" style="padding-bottom: 20px;text-align: center;">
    <div class="container">
        <h3 class="title" style="margin-bottom: 0 !important;"><span>Shop By Brands</span> <a href="/brands/list">view
                all</a></h3>
        <div class="cat-row" style="display:block;">
            @foreach (App\Models\Brand::where('status',1)->take(7)->get() as $brand)
            <a href="{{route('brand.product',['slug'=>$brand->slug])}}" class="cat-item">
                <div class="">
                    <div class="thumbnail">
                        <img src="{{asset('uploads/brand/'.$brand->cover_photo)}}" alt="">
                    </div>
                </div>
            </a>

            @endforeach
        </div>
    </div>
</div>
<!--================product  Area End=================-->
@endif

@if (setting('CATEGORY_SMALL_SUMMERY') != 0 || setting('CATEGORY_SMALL_SUMMERY') == "")
<div class="category-thumbanial" style="padding-bottom: 40px;">
    <div class="container box-sh">
        <div class="row" style="text-align: center;">
            @foreach ($collections as $key => $collection)
            <div class="category-item  col-md-3 col-sm-3 col-6">
                <div class="item-in">
                    <div class="thumbnail">
                        <a href="{{route('collection.product', $collection->slug)}}">
                            <img src="{{asset('uploads/collection/'.$collection->cover_photo)}}" alt="Collection Image">
                        </a>
                    </div>
                    <p style=" font-weight: 600;margin: 5px 0px 0px 0px;">{{$collection->name}} </p>
                    @php
                    $categoryIds = $collection->categories->pluck('id');
                    $productIds = DB::table('category_product')->whereIn('category_id',
                    $categoryIds)->get()->pluck('product_id');
                    $products = \App\Models\Product::whereIn('id', $productIds)->where('status',1)->count();
                    @endphp
                    <p>{{$products}} products</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<style>
    .bef-footer .items {
        padding: 20px;
        background: #232f3f;
        border-radius: 5px;
        color: white !important
    }

    .bef-footer {
        background: #232f3f
    }

    footer {
        margin: 0 !important;
    }
</style>
@endif

@if (setting('NEWS_LETTER_STATUS') != 0 || setting('NEWS_LETTER_STATUS') == "")
<div class="bef-footer">
    <div class="container" style="padding: 20px 0px; ">
        <div class="items">
            <div class="search-box">

                <div class="row">
                    <div class="col-md-6">
                        <h5 style="margin-bottom: 10px;"><b>Sign Up For Newsletter</b> </h5>
                        <h6>
                            We'll never share your email address with a third-party</h6>
                    </div>
                    <div class="col-md-6">
                        <form action="{{route('subscription')}}" method="Post" id="subs">
                            @csrf
                            <div class="input-group">
                                <input class="sear" type="email" name="subscription" placeholder="Enter Your Email">
                                <button style="width:initial" class="input-group-addon components-bg"
                                    type="submit">Subscribe </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif

<x-add-cart-modal />
@include('components.cart-modal-attri')

@endsection



@push('js')
<script>
    $(document).ready(function () {
        $('.value-plus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.val(), 10) + 1;
            divUpd.val(newVal);
            $('input#qty').val(newVal);
        });

        $('.value-minus').on('click', function () {
            var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.val(), 10) - 1;
            if (newVal >= 1) {
                divUpd.val(newVal);
                $('input#qty').val(newVal);
            }

        });

        $(document).on('submit', '#addToCart', function (e) {
            e.preventDefault();

            let url = $(this).attr('action');
            let type = $(this).attr('method');
            let btn = $(this);
            let formData = $(this).serialize();

            $.ajax({
                type: type,
                url: url,
                data: formData,
                dataType: 'JSON',
                beforeSend: function () {
                    $(btn).attr('disabled', true);
                },
                success: function (response) {
                    if (response.alert != 'Congratulations') {

                        $.toast({
                            heading: 'Warning',
                            text: response.message,
                            icon: 'warning',
                            position: 'top-right',
                            stack: false
                        });
                    } else {
                        $('span#total-cart-amount').text(response.subtotal);

                        $.toast({
                            heading: 'Congratulations',
                            text: response.message,
                            icon: 'success',
                            position: 'top-right',
                            stack: false
                        });

                        $('#cart-modal').modal('hide');
                    }

                },
                complete: function () {
                    $(btn).attr('disabled', false);
                },
                error: function (xhr) {
                    $.toast({
                        heading: xhr.status,
                        text: xhr.responseJSON.message,
                        icon: 'error',
                        position: 'top-right',
                        stack: false
                    });
                }
            });
        })
        $(document).on('submit', '#subs', function (e) {
            e.preventDefault();

            let url = $(this).attr('action');
            let type = $(this).attr('method');
            let btn = $(this);
            let formData = $(this).serialize();

            $.ajax({
                type: type,
                url: url,
                data: formData,
                dataType: 'JSON',
                beforeSend: function () {
                    $(btn).attr('disabled', true);
                },
                success: function (response) {
                    if (response.alert != 'Congratulations') {

                        $.toast({
                            heading: 'Warning',
                            text: response.message,
                            icon: 'warning',
                            position: 'top-right',
                            stack: false
                        });
                    } else {
                        $('span#total-cart-amount').text(response.subtotal);

                        $.toast({
                            heading: 'Congratulations',
                            text: response.message,
                            icon: 'success',
                            position: 'top-right',
                            stack: false
                        });

                        $('#cart-modal').modal('hide');
                    }

                },
                complete: function () {
                    $(btn).attr('disabled', false);
                },
                error: function (xhr) {
                    $.toast({
                        heading: xhr.status,
                        text: xhr.responseJSON.message,
                        icon: 'error',
                        position: 'top-right',
                        stack: false
                    });
                }
            });
        })

    });

    $('.slider').slick({
        draggable: true,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: false,
        dots: true,
        fade: true,
        speed: 500,
        infinite: true,
        cssEase: 'ease-in-out',
        touchThreshold: 100
    })
    $('.autoplay2').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: false,
        speed: 500,
        infinite: true,
        cssEase: 'ease-in-out',
        touchThreshold: 100,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },

        ]
    });
    $('.catplay').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: false,
        speed: 500,
        infinite: true,
        cssEase: 'ease-in-out',
        touchThreshold: 100,
        responsive: [

            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },

        ]
    });
</script>

@if (env('FIREBASE_ON') == 1)
<script src="https://www.gstatic.com/firebasejs/8.2.0/firebase.js"></script>
<script>
    var firebaseConfig = {
        apiKey: env('FIREBASAE_apiKey'),
        authDomain: env('FIREBASAE_authDomain'),
        projectId: env('FIREBASAE_projectId'),
        storageBucket: env('FIREBASAE_storageBucket'),
        messagingSenderId: env('FIREBASAE_messagingSenderId'),
        appId: env('FIREBASAE_appId')
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();


    messaging
        .requestPermission()
        .then(function () {
            return messaging.getToken()
        })
        .then(function (token) {
            console.log(token);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route("save-token") }}',
                type: 'POST',
                data: {
                    token: token
                },
                dataType: 'JSON',
                success: function (response) {
                    alert('Token saved successfully.');
                },
                error: function (err) {
                    console.log('User Chat Token Error' + err);
                },
            });

        }).catch(function (err) {
            console.log('User Chat Token Error' + err);
        });


    messaging.onMessage(function (payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
</script>
@endif

<script type="text/javascript">
    $(window).on('load', function () {
        $('#myModal').modal('show');
    });
</script>
@endpush