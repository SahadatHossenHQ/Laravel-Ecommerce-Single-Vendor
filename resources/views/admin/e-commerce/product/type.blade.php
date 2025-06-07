@extends('layouts.admin.e-commerce.app')

@section('title', 'Type List')


@section('content')

<br>
<!-- Main content -->
<section class="content">
    <div class="row">
        {{-- <div class="col-lg-3 col-6">
            <a href="{{routeHelper('product/create')}}">
            	<div class="small-box bg-info">
	                <div class="inner">
	                    <h3>Normal</h3>
	                     <p>Add new product</p>
	                </div>
	                <div class="icon">
	                    <i class="fas fa-plus-circle"></i>
	                </div>
	            </div>
            </a>
        </div> --}}
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{route('admin.product.inhouse.create')}}">
	            <div class="small-box bg-warning">
	                <div class="inner">
	                    <h3>Inhouse</h3>
	                    <p>Add new product</p>
	                </div>
	                <div class="icon">
	                    <i class="fas fa-plus"></i>
	                </div>
	               
	            </div>
	        </a>
        </div>
       
    </div>
</section>
<!-- /.content -->
@endsection

