@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="All Products"/>
<meta name='keywords' content="@foreach($products as $product){{$product->title.', '}}@endforeach" />
@endpush

@section('title', 'Campaign Products')

@push('css')
    <link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/jquery-ui1.css">
    <style>
        .view-filter{
            display:none
        }
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');
    
        .rating {
            display: inline-flex;
            margin-top: -10px;
            flex-direction: row-reverse
        }
    
        .rating>input {
            display: none
        }
    
        .rating>label {
            position: relative;
            width: 28px;
            font-size: 35px;
            color: #ff0000;
            cursor: pointer
        }
    
        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }
    
        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }
    
        .rating>input:checked~label:before {
            opacity: 1
        }
    
        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }
        .product-page .products .product{
            margin: 0 !important;
            box-shadow: none;
            border: none;
            margin-bottom: 10px !important
        }
       
    </style>
@endpush

@section('content')
<!--================product  Area start=================-->
<div class="container product-page" style="margin-top: 10px">

    <div class="row">
        <!-- tittle heading -->
        <div class="menu-overly2"></div>
        <div class="side-bar col-md-3">
            
            <x-filter-search-component />
            
        </div>
        
        <div class="products col-md-9">
        
            <div class="container">
                <div class="row" style="margin-bottom: 10px;">
                    <x-filter-component />
                </div>

                <div class="row " id="grid-view">
                    @forelse ($products as $product)

                        <div class="product col-lg-3 col-md-3 col-sm-4 col-4">
    <?php 
       $typeid=$product->slug;
    ?>

    <div class="product-wrapper"   @if(setting('is_point')==1) style="height: 320px;" @endif>
        <div class="pin">
            <div class="thumbnail">
            <a href="{{route('product.cam.details', $product->pid)}}">
                <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                </a>
            </div>
            <div class="details">
                 <a href="{{route('product.cam.details', $product->pid)}}">
                    <h5>{{$product->title}}</h5>
                </a>
               
                 <span style="color: #ea6721;">
                    @php
                        $percent = round((($product->regular_price - $product->cprice ?? $product->discount_price) / $product->regular_price) * 100, 2);
                    @endphp
                    <h6 class="dis-label">{{$percent}}% OFF</h6>
                    <h6></h6>
                </span>
                
            </div>
            <div class="quick-view">  <a href="{{route('product.cam.details', $product->pid)}}"><i class="icofont icofont-search"></i> Quick View</a></div>
       </div>
        <div class="home-add2">
             <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->cprice ?? $product->discount_price}}</strong> <del>{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->regular_price}}</del></h6>
          
           <div class="cbtn">
                <button type="submit" class="redirect" style="margin-top: 10px;" data-url="{{route('camp.product.info',$product->pid)}}" id="productInfo1" type="submit" title="Add To Cart"><i class="fal fa-shopping-cart" aria-hidden="true"></i> </button>
                
                <form action="{{route('wishlist.add')}}" method="post" id="submit_payment_form{{$typeid}}">
                @csrf
                    <input type="hidden" name="product_id" value="{{$product->slug}}"> 
                    <button style="margin-top: 5px;" class="redirect" type="submit" title="Wishlist"><i class="fal fa-heart" aria-hidden="true"></i> </button>
                </form>
           </div>
        </div>
    </div>
</div>
@push('js')
<script>
    // form submit 
    $(document).on('submit', '#submit_payment_form{{$typeid}}', function(e) {
            e.preventDefault();
            
            let action   = $(this).attr('action');
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: action,
                data: formData,
                dataType: "JSON",
                beforeSend: function() {
                    loader(true);
                },
                success: function (response) {
                    responseMessage(response.alert, response.message, response.alert.toLowerCase())
                },
                complete: function() {
                    loader(false);
                },
                error: function (xhr) {
                    if (xhr.status == 422) {
                        if (typeof(xhr.responseJSON.errors) !== 'undefined') {
                            
                            $.each(xhr.responseJSON.errors, function (key, error) { 
                                $('small.'+key+'').text(error);
                                $('#'+key+'').addClass('is-invalid');
                            });
                            responseMessage('Error', xhr.responseJSON.message, 'error')
                        }

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

                    @empty
                        <x-product-empty-component />
                    @endforelse
      
                </div>
               

               
                <div class="row">
                    <div class="load ajax-loading col-lg-3 col-md-3 col-sm-6 col-6" style="display: none;">
                        <div class="covera skeletona">
                            <img id="cover" src="" />
                        </div>
                        <div class="contenta">
                            <h2 id="title" class="skeletona"></h2>
                            <small id="subtitle" class="skeletona"></small>
                            <small id="subtitle" class="skeletona2 skeletona"></small>
                            <div style="text-align: center;">
                            <p id="about" class="skeletona"></p>
                            <p id="about" class="skeletona"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================product  Area End=================-->

        <!-- //product right -->
    </div>
</div>
  <!-- //top products -->
<x-add-cart-modal />
<style>
    .bef-footer .items {
    padding: 20px;
    margin-bottom: 20px;
    background: white;
    border-radius: 5px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1)
}
</style>
<div class="bef-footer">
        <div class="container" style="padding: 0">
            <div class="items">
                <div class="search-box">
                    <h5 style="text-align: center;margin-bottom: 20px;">Leave Your Commment For This Campaing</h5>
                   <div class="row">
                       <div class="col-md-2"></div>
                        <form class="col-md-8" action="{{route('campaing.comment')}}" method="Post">
                               @csrf
                            <div class="input-group">
                                <input class="sear" type="text" name="comment" placeholder="Type Your Comments">
                                <button class="input-group-addon components-bg" type="submit">Send </button>
                            </div>
                           <input class="sear" type="hidden" name="campaign_id" value="{{$id}}">
                        </form>
                        <div class="col-md-2"></div>
                   </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.cart-modal-attri')
@endsection

@push('js')
    <script src="{{asset('/')}}assets/frontend/js/jquery-ui.js"></script>
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

            $(document).on('submit', '#addToCart', function(e) {
                e.preventDefault();

                let url      = $(this).attr('action');
                let type     = $(this).attr('method');
                let btn      = $(this);
                let formData = $(this).serialize();

                $.ajax({
                    type: type,
                    url: url,
                    data: formData,
                    dataType: 'JSON',
                    beforeSend: function() {
                        $(btn).attr('disabled', true);
                    },
                    success: function (response) {
                        if(response.alert!='Congratulations'){
             
                            $.toast({
                                heading: 'Warning',
                                text: response.message,
                                icon: 'warning',
                                position: 'top-right',
                                stack: false
                            });
                        }else{
                        $('span#total-cart-amount').text(response.subtotal);

                        $.toast({
                            heading: 'Congratulations',
                            text: response.message,
                            icon: 'success',
                            position: 'top-right',
                            stack: false
                        });

                        $('#cart-modal').modal('hide');}
                        
                    },
                    complete: function() {
                        $(btn).attr('disabled', false);
                    },
                    error: function(xhr) {
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

            $(document).on('change', 'select#sort', function() {

                let value = $(this).val();

                $('input[name="sort"]').val(value);

                $('form#form').submit();
            });

            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 9000,
                values: [50, 6000],
                slide: function (event, ui) {
                    $("#amount").val({{ setting('CURRENCY_CODE_MIN') ?? 'TK' }} + ui.values[0] + " - {!! setting('CURRENCY_CODE_MIN') ?? 'TK' !!}" + ui.values[1]);
                }
            });
            $("#amount").val({{ setting('CURRENCY_CODE_MIN') ?? 'TK' }} + $("#slider-range").slider("values", 0) + " - {!! setting('CURRENCY_CODE_MIN') ?? 'TK' !!}" + $("#slider-range").slider("values", 1));
        });
        
    </script>
<script>
   var site_url = "{{ url('/') }}";   
   var page = 1;
   
   load_more(page);


    function load_more(page){
        var slg = '{!! $slug !!}';
        var _totalCurrentResult=$(".product").length;
        $.ajax({
           url: site_url + "/Campaign/product/"+slg+"?page=" + page,
            type: "get",
            datatype: "html",
            data:{
                        skip:_totalCurrentResult
                },
            beforeSend: function()
            {
                $('.ajax-loading').show();
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('.ajax-loading').hide();
                $("#grid-view").append(result[0]);
                $("#list-view").append(result[1]);
                if(result[0].length==0){
                }else{
                   
                    setTimeout(function() {
                        page++;
                        load_more(page);
                    }, 3000);
                }
            },
            
        })
        
       
    }
</script>
@endpush