@extends('layouts.frontend.app')
@push('meta')
<meta name='description' content="Category Products"/>
<meta name='keywords' content="@foreach(\App\Models\Campaign::all() as $campaign){{$campaign->name.', '}}@endforeach" />
@endpush

@section('title', 'Campaign')
@section('content')
<ul style="display:flex" class="under-menu">
    <li><a href="{{route('campaing')}}" class="{{Request::is('Campaign*') ? 'active':''}}">Campaign</a> </li>
    <li><a href="{{route('blogs')}}" class="{{Request::is('blogs*') ? 'active':''}}">Blogs</a></li>
    <li><a href="{{route('blog.ceo')}}" class="{{Request::is('blog/ceo*') ? 'active':''}}">CEO</a></li>
</ul>
<div class="category-thumbanial" style="padding-bottom: 40px;margin-top:20px">
    <div class="containe box-sh">
        <div class="row" style="text-align: center;">
         
            @foreach ($campaigns as $data)
                <div class="category-item  col-md-3 col-sm-3 col-6">
                    <div class="item-in">
                       
                        <div class="thumbnail">
                            <a href="{{route('campaing.product',['slug'=>$data->slug])}}">  
                                <img src="{{asset('uploads/campaign/'.$data->cover_photo)}}" alt="Campaign Image">                         
                            </a>
                        </div>
                         <p style=" font-weight: 600;margin: 5px 0px 0px 0px;">{{$data->name}} </p>
                         <p>{{$data->campaing_products->count()}} products</p>
                      
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


