@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($brand)
        Edit Brand 
    @else 
        Add Brand
    @endisset
@endsection

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
            <div class="col-sm-6">
                <h1>
                    @isset($brand)
                        Edit Brand 
                    @else 
                        Add Brand
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($brand)
                            Edit Brand 
                        @else 
                            Add Brand
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Default box -->
            <div class="card" style="background:transparent;">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">
                                @isset($brand)
                                    Edit Brand
                                @else 
                                    Add New Brand
                                @endisset
                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            @isset($brand)
                            <a href="{{routeHelper('brand/'.$brand->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                                Show
                            </a>
                            @endisset
                            <a href="{{routeHelper('brand')}}" class="btn btn-danger">
                                
                                <i class="fas fa-long-arrow-alt-left"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ isset($brand) ? routeHelper('brand/'.$brand->id) : routeHelper('brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($brand)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Write brand name" class="form-control @error('name') is-invalid @enderror" value="{{ $brand->name ?? old('name') }}" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" cols="5" placeholder="Write category description" class="form-control @error('description') is-invalid @enderror">{{ $brand->description ?? old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_photo">Cover Photo:</label>
                            <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-control @error('cover_photo') is-invalid @enderror" data-default-file="@isset($brand) /uploads/brand/{{$brand->cover_photo}}@enderror">
                            @error('cover_photo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($brand) {{ $brand->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($brand)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                @else
                                    <i class="fas fa-plus-circle"></i>
                                    Submit
                                @endisset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    

</section>
<!-- /.content -->

@endsection

@push('js')
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script>
        $(function () {
            $('#cover_photo').dropify();
        });
    </script>
@endpush