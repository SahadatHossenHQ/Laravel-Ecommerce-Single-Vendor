@extends('layouts.frontend.app')
@push('meta')
<meta property="og:image" content="{{asset('uploads/setting/'.setting('auth_logo'))}}" />
@endpush
{{-- @section('title', setting('site_title') ) --}}

@section('content')







@if (setting('TOP_CAT_STATUS') != 0 || setting('TOP_CAT_STATUS') == "")
<!--================ top category Area =================-->
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


{{-- Catgory Collups and Expand System --}}
@push('internal_css').superCatHomeToggle{height:330px;overflow-y:hidden;}.superCatHomeToggle  #superCatViewAll{bottom:0;}#superCatViewAll{position:absolute;bottom:-1.5rem;left:0;right:0;background:var(--MAIN_MENU_BG);color:var(--MAIN_MENU_ul_li_color);z-index:999;outline:none;}@endpush
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var buttonElement = document.createElement('button');
        buttonElement.id = 'superCatViewAll';
        buttonElement.innerText = 'View All';
        var superCatElement = document.getElementById('superCat');
        superCatElement.appendChild(buttonElement);
        superCatElement.classList.add('superCatHomeToggle');
        buttonElement.addEventListener('click', function () {
            superCatElement.classList.toggle('superCatHomeToggle');
            if (buttonElement.innerText === 'View All') {
                buttonElement.innerText = 'Close';
            } else {
                buttonElement.innerText = 'View All';
            }
        });
    });
</script>
@endpush
{{-- / Catgory Collups and Expand System --}}

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
@endpush