@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
                <h1>Setting - <small>Header</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application Settings</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-8 offset-md-2">
                    <!-- Default box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Custom Header Code</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="13">
                            @method('PUT')
                            <div class="card-body">
                                
                                <div class="form-group col-md-12">
                                    <label for="site_title" class="text-capitalize">Site default title <span class="text-red">(*)</span></label>
                                    <input name="site_title" id="site_title" type="text" class="form-control" placeholder="Lems - Multivendor E-Commerce Solution" value="{{ setting('site_title') }}" required />
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="meta_description" class="text-capitalize">Meta description <span class="text-red">(*)</span></label>
                                    <textarea name="meta_description" id="meta_description" rows="4"
                                        class="form-control" placeholder="Bangladeshi Best Ecommerce Software Lems, Optimized and super valuable extendable multivendor E-commerce solution" required>{{ setting('meta_description') }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="meta_keywords" class="text-capitalize">Meta keywords <span class="text-red">(*)</span></label>
                                    <textarea name="meta_keywords" id="meta_keywords" rows="4"
                                        class="form-control" placeholder="Quality Cloths, Backpack bangladesh, BD price Ba" required>{{ setting('meta_keywords') }}</textarea>
                                </div>
                                
                                <a href="{{ route('admin.setting') }}#meta_img_wrap">Meta Image <i class="fas fa-caret-right"></i></a>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>
<!-- /.content -->

@endsection
