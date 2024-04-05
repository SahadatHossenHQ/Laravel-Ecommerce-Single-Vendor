@extends('layouts.admin.e-commerce.app')

@section('title', 'Shop Details')

@push('css')
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
            <div class="col-sm-6 offse">
                <h1>System - <small>Update</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">System Update</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application Update</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-8 offset-md-2">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - System Update</h3>
                        </div>

                        <form action="{{ route('admin.update') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <label for="password" class="text-capitalize">Enter your password to update</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection