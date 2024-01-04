@extends('layouts.frontend.app')

@section('title', 'Shopping Now')

@section('content')
<style>
    form .form2{
        box-shadow: 0px 0px 5px gainsboro;
padding: 20px;
border-radius: 5px;
margin-top: 50px;
background: white
    }
</style>
<?php
Session::forget('link');
 Session::put(['link' => url()->previous()]);
?>
<div class="wrapper" style="background:white;padding:20px">
  @php
    $category=\App\Models\Category::where('status',1)->where('slug','service')->first();
  @endphp
  <div class="container">
  <div class="row">
        @if ($category->sub_categories->count() > 0)
         @foreach ($category->sub_categories as $sub_category)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                 <a href="{{route('subCategory.product', $sub_category->slug)}}"> <h2 style="font-size:22px"><b>{{$sub_category->name}}</b></h2> </a>
                  @if ($sub_category->miniCategory->count() > 0)
                  @foreach ($sub_category->miniCategory as $miniCategory)
                    <a href="{{route('miniCategory.product', $miniCategory->slug)}}"> <h4 style="font-size:20px;margin-left:4px">{{$miniCategory->name}}</h4> </a>
                     @if ($miniCategory->extraCategory->count() > 0)
                      @foreach ($miniCategory->extraCategory as $extraCategory)
                      <a href="{{route('extraCategory.product', $extraCategory->slug)}}"><p style="font-size:15px;margin-left:8px">{{$extraCategory->name}}</p> </a>
                       @endforeach
                     @endif
                  @endforeach
                 @endif
            </div>
            
        @endforeach
        @endif
  </div>
  </div>
</div>


@endsection