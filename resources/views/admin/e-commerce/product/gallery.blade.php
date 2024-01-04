@extends('layouts.admin.e-commerce.app')

@section('title', 'docs')


@section('content')
<style> .dr img{width:100%;height:230px;object-fit:contain;background:white;padding:10px;border-radius:5px} .dr{background:white;text-align:center}</style>
<div class="container">
    <div class="row">
        @foreach($images as $img)
        <div class="col-md-4 col-sm-4 col-6 dr">
            
            <img src="{{asset('uploads/product/'.$img->name)}}" style="">
            <a href="{{ routeHelper('product/'.$img->product_id.'/edit') }}">edit or delete</a>
        </div>
        @endforeach
    </div>
</div>
@endsection