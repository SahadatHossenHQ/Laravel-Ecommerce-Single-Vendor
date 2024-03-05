@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="{{$product->title}}"/>
@endpush

@section('title', $product->title)

@push('css')
<link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/flexslider.css">
<link rel="stylesheet" href="{{asset('/')}}assets/frontend/css/image-zoom.css">

<style>
    label.btn.rounded-circle.active {
        box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
    }

    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap');
    .footer-menu{
        display: none !important
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
    footer{
        padding-bottom: 44px
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
</style>
@endpush

@section('content')

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
    
        <!-- //tittle heading -->
        <div class="row" style="background: white;margin-top: 20px;">
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <img src="{{asset('uploads/product/'.$product->thumbnail)}}" class="my-gallery-image" class="img-responsive" alt="" draggable="false"> 
                </div>
            </div>
            <div class="col-md-7 single-right-left simpleCart_shelfItem">
                <h4 style="padding-top: 20px"><b>{{$product->title}}</b></h4>
                <p style="display: flex;margin: 10px 0px;">
                <b>Price:</b> <span class="item_price">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.<span id="dynamic_price">{{$product->price}}</span></span>
                </p>
                <style>
                    tr{
                        width: 100%;
                        display: block;
                        padding: 10px;
                    }
                    table tbody{
                        display: block;
                        width:100% ;
                    }
                </style>
                <table border="1" style="display: block;
border: 1px solid gainsboro;
border-radius: 5px;">
                    <tr>
                        <td><i class="fas fa-phone"></i> {{$product->contact}}</td>
                    </tr>
                     <tr style="border:1px solid gainsboro;">
                        <td><i class="far fa-map"></i> {{$product->location}}</td>
                    </tr>
                     <tr>
                        <td><i class="fas fa-user"></i> {{$product->user->name}}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <br>
        <div class="row" style="background: white;margin-top: 20px;">
            <div id="accordion" style="width: 100%;">
                <div class="lc-4">
                    <button class="collapsed" data-toggle="collapse" data-target="#description" aria-expanded="true" aria-controls="description">
                            Description
                    </button>
                </div>

                <div id="description" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        {!! $product->description !!}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{asset('/')}}assets/frontend/js/jquery.flexslider.js"></script>
<script src="{{asset('/')}}assets/frontend/js/image-zoom.js"></script>
<script src="{{asset('/')}}assets/frontend/js/toast.min.js"></script>

<script>
    $(document).ready(function () {

        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });

        
    
</script>
<script type="text/javascript">
        $(document).ready(function(){
            $('.my-gallery-image').each(function(){
                $(this).imageZoom({zoom : 200});
            });
        });
    </script>
@endpush