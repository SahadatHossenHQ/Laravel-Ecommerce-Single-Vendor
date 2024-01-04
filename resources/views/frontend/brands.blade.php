@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    .shop-brand.shop-category .cat-row .cat-item img{
        width: 100%;
        height: 100px;
        padding: 0;
    }
    .shop-brand .title{
        text-align: left;
        margin: 0 !important;
    }
</style>
<div class="shop-category shop-brand" style="padding-bottom: 20px;text-align: center;">
    <div class="container">
        <div class="cat-row" style="display:block;">
            @foreach ($brands as $brand)
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
@endsection