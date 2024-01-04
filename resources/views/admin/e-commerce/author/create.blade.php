@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($staff)
        Edit Author 
    @else 
        Add Author
    @endisset
@endsection
@push('css')
<link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
@endpush

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($staff)
                        Edit staff 
                    @else 
                        Add staff
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($staff)
                            Edit staff 
                        @else 
                            Add staff
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        @isset($staff)
                            Edit Author
                        @else 
                            Add New Author
                        @endisset
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                   
                    <a href="{{routeHelper('staff')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ isset($staff) ? routeHelper('staff/'. $staff->id) : route('admin.author.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Write staff name" class="form-control @error('name') is-invalid @enderror" value="{{ $staff->name ?? old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profile">Profile</label>
                        <input class="form-control" type="file" name="profile"  required>
                        @error('profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="form-group col-md-12">
                        <label for="bio">Bio:</label>
                        <textarea name="bio" id="bio" rows="3" placeholder="Write   bio" class="form-control @error('bio') is-invalid @enderror" >{{ $product->bio ?? old('bio') }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    
                </div>
                
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button class="mt-1 btn btn-primary">
                        @isset($staff)
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
    

</section>
<!-- /.content -->

@endsection
@push('js')
 <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
 <script>
         $(document).ready(function () {

            $('#bio').summernote()
         })
 </script>
@endpush