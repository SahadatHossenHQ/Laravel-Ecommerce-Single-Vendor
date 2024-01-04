
@extends('layouts.admin.e-commerce.app')

@section('title', 'docs')
@push('css')
    <!-- Select2 -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
      </style>
@endpush


@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Product Export/impot</h3>
                </div>
                <div class="col-sm-6 text-right">
                  
                    <a class="btn btn-success" href="{{route('admin.product.export')}}"><i class="fas fa-file-export"></i> Export</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        	<form method="post" action="{{route('admin.product.import')}}" enctype="multipart/form-data">
        		@csrf
        		<input class="dropify" type="file"  name="product">
	        	<br>
	        	<input type="submit" value="Import"   class="btn btn-success">
        	</form>
        </div>
    </div>
</section>

@endsection
@push('js')
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script>
    	   $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
@endpush