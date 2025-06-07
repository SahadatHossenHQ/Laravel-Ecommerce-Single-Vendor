@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="Review Products"/>
<meta name='keywords' content="E-commerce, Best e-commerce website" />
@endpush

@section('title', 'Review Products')

@push('css')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');
    .cross {
        padding: 10px;
        color: #d6312d;
        cursor: pointer;
        font-size: 23px
    }

    .cross i {
        margin-top: -5px;
        cursor: pointer
    }

    .comment-box {
        padding: 5px
    }

    .comment-area textarea {
        resize: none;
        border: 1px solid #ff0000
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
    }

    .send {
        color: #fff;
        background-color: #ff0000;
        border-color: #ff0000
    }

    .send:hover {
        color: #fff;
        background-color: #f50202;
        border-color: #f50202
    }

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
</style>
@endpush

@section('content')

<div class="banner-bootom-w3-agileits">
    <div class="container">
        <div class="row my-4">
            @foreach ($order->orderDetails as $item)
            <div class="col-md-6 mb-3">
                <div class="card" style="background:transparent;">
                    <div class="card-body">
                        <div class="media">
                            <img class="mr-3" src="{{asset('uploads/product/'.$item->product->image)}}" alt="Product Image" width="150px">
                            <div class="media-body">
                                <strong class="mt-0">{{$item->title}}</strong> <br>
                                <p>{{$item->title}}</p>
                               <!--  <p><strong>Color:</strong> {{$item->color}}</p>
                                <p><strong>Size:</strong> {{$item->size}}</p> -->
                                <p><strong>Qty:</strong> {{$item->qty}}</p>
                                <p><strong>Price:</strong> {{$item->price}}</p>
                                <p><strong>Total Price:</strong> {{$item->total_price}}</p>
                            </div>
                        </div>
                        @php
                            $check = DB::table('reviews')->where('user_id', auth()->id())->where('product_id', $item->product_id)->first();
                        @endphp
                        @if (!$check)
                        <div class="comment-box text-center mt-3">
                            <form action="{{route('review.store', $item->product_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                <h4>Give Rating</h4>
                                <div class="rating"> 
                                    <input type="radio" name="rating" value="5" id="5">
                                    <label for="5">☆</label> 
                                    <input type="radio" name="rating" value="4" id="4">
                                    <label for="4">☆</label> 
                                    <input type="radio" name="rating" value="3" id="3">
                                    <label for="3">☆</label> 
                                    <input type="radio" name="rating" value="2" id="2">
                                    <label for="2">☆</label> 
                                    <input type="radio" name="rating" value="1" id="1">
                                    <label for="1">☆</label> 
                                </div>

                                <div class="comment-area"> 
                                    <textarea required class="form-control" name="review" placeholder="what is your view?"></textarea> 
                                    @error('review')
                                        <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report">
                                </div>
                                 <h6 style="border: 1px solid gainsboro;padding: 5px;border-radius: 5px;"> <button style="width: 100%;text-align:left;" type="button" data-toggle="collapse" data-target="#BookOpen" aria-expanded="false" aria-controls="BookOpen">Upload More Img:<i style="float: right;top: 8px;position: relative;" class="fas fa-arrow-down"></i> </button></h6>
                                 <style type="text/css">
                                     #BookOpen .form-group {
                                        width: 100%;
border: 1px solid gainsboro;
padding: 10px;
border-radius: 5px;
                                     }
                                 </style>
                                 <div class="form-row col-md-12 spec collapse" id="BookOpen" style="background: #dcdcdc3d;border-radius: 5px;padding: 10p;">
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report2">
                                </div>
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report3">
                                </div>
                                 <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report4">
                                </div>
                                <div class="form-group text-left">
                                    <label style="display:block">Upload Image</label>
                                    <input type="file" name="report5">
                                </div>
                                </div>
                                <div class="text-right mt-4"> 
                                    <button class="btn btn-success send px-5">Submit</button> 
                                </div>
                            </form>
                        </div> 
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

@endsection

@push('js')

@endpush