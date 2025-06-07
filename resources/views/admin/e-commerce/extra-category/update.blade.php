@extends('layouts.admin.e-commerce.app')

@section('title')
@isset($category)
Edit Category
@else
Add Category
@endisset
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" />
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
                    @isset($category)
                    Edit Category
                    @else
                    Add Category
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($category)
                        Edit Category
                        @else
                        Add Category
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
                                Edit Category Details

                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            @isset($category)
                            <a href="{{routeHelper('category/'.$category->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                                Show
                            </a>
                            @endisset

                            <a href="{{routeHelper('category')}}" class="btn btn-danger">

                                <i class="fas fa-long-arrow-alt-left"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
                @if(!empty(Session::get('massage2')))
                <span
                    style="margin-bottom: 20px;display: block;color: #1cc88a;text-align: center;background: white;padding: 5px;border-radius: 5px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;">
                    {{ Session::get('massage2')}}</span>
                @endif

                <form action="{{route('admin.edit.extra')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{$extra->id}}" name="ddddd">

                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Category name:</label>
                            <select name="main" id="mainCategory" class="category form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option {{$hascategories->id==$category->id ? 'selected':''}} value="{{$category->id}}">
                                    {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nsubc">Select Sub Category:</label>
                            <select name="nsubc" id="nsubc" class="sub_category form-control">
                                <option value="{{$hsasub->id}}">{{$hsasub->name}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mini">Select mini Category:</label>
                            <select name="mini" id="mini" class="sub_category form-control">
                                <option value="{{$hsaMini->id}}">{{$hsaMini->name}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Write category name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ $extra->name ?? old('name') }}" required autocomplete="off">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_photo">Cover Photo:</label>
                            <input type="file" name="cover_photo" id="cover_photo" accept="image/*"
                                class="form-control @error('cover_photo') is-invalid @enderror"
                                data-default-file="@isset($extra) /uploads/extra-category/{{$extra->cover_photo}}@enderror">
                            @error('cover_photo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset
                                    ($extra) {{ $extra->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_feature" id="is_feature"
                                    @isset ($extra) {{ $extra->is_feature ? 'checked':'' }} @else checked @endisset>
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
                                @isset($category)
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
<script src="/assets/dist/extra.js"></script>
<script>
    $(function () {
        $('#cover_photo').dropify();
    });
</script>
@endpush
