@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($subCategory)
        Edit Sub Category 
    @else 
        Add Sub Category
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
                    @isset($subCategory)
                        Edit Sub Category 
                    @else 
                        Add Sub Category
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($subCategory)
                            Edit Sub Category 
                        @else 
                            Add Sub Category
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
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="card-title">
                                @isset($subCategory)
                                    Edit Sub Category Details
                                @else 
                                    Add New Sub Category
                                @endisset
                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            
                            <a href="{{routeHelper('sub-category')}}" class="btn btn-danger">
                                
                                <i class="fas fa-long-arrow-alt-left"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ isset($subCategory) ? routeHelper('sub-category/'.$subCategory->id) : routeHelper('sub-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($subCategory)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Select Category:</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @isset($subCategory) {{$subCategory->category_id == $category->id ? 'selected':''}} @endisset>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Write sub category name" class="form-control @error('name') is-invalid @enderror" value="{{ $subCategory->name ?? old('name') }}" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_photo">Cover Photo:</label>
                            <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-control @error('cover_photo') is-invalid @enderror" data-default-file="@isset($subCategory) /uploads/sub category/{{$subCategory->cover_photo}}@enderror">
                            @error('cover_photo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($subCategory) {{ $subCategory->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_feature" id="is_feature" @isset ($subCategory) {{ $subCategory->is_feature ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="is_feature">is_features</label>
                            </div>
                            @error('is_feature')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($subCategory)
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