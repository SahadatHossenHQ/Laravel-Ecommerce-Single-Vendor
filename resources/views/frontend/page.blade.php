@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="{{$page->name}}"/>
<meta name='keywords' content="{{$page->name}}"/>
@endpush

@section('title', $page->name)

@section('content')

<!--================product  Area start=================-->
<div class="malls">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {!! html_entity_decode($page->body) !!}
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!--================product  Area End=================-->

@endsection