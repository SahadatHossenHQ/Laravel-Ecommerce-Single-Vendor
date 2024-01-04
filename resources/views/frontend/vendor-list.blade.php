@extends('layouts.frontend.app')

@push('meta')
    
@endpush

@section('title', 'Vendor List')

@push('css')
    
@endpush

@section('content')

<!--================product  Area start=================-->
<div class="malls">
    <div class="container">
        <div class="row py-5">
            @foreach ($shops as $shop)
            <div class="col-md-3 mb-3">
                <div class="mall ">
                    <div class="mall-wrapper">
                        <a href="{{route('vendor', $shop->slug)}}">
                            <div class="cover">
                                <img src="{{asset('uploads/shop/cover/'.$shop->cover_photo)}}" alt="Cover Photo">
                            </div>
                            <div class="profile-d" style="background: white;">
                                <img src="{{asset('uploads/shop/profile/'.$shop->profile)}}" alt="">
                                <p>{{$shop->name}}</p>
                                <p>{{$shop->routing}}</p>
                            </div>
                            <div class="overly"></div>
                        </a>
                    </div>
                </div>
            </div>
            
            @endforeach
            
        </div>
    </div>
</div>
<!--================product  Area End=================-->

@endsection

@push('js')
    
@endpush