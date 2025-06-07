@extends('layouts.admin.e-commerce.app')

@section('title')
    @isset($attribute)
        Edit attribute 
    @else 
        Add attribute
    @endisset
@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($attribute)
                        Edit attribute 
                    @else 
                        Add attribute
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($attribute)
                            Edit attribute 
                        @else 
                            Add attribute
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
                                @isset($attribute)
                                    Edit attribute
                                @else 
                                    Add New attribute
                                @endisset
                            </h3>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{routeHelper('attribute/list')}}" class="btn btn-danger">
                                
                                <i class="fas fa-long-arrow-alt-left"></i>
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ isset($attribute) ? routeHelper('attribute/'.$attribute->id) : route('admin.attribute.store') }}" method="POST">
                    @csrf
                    @isset($attribute)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="form-group">
                             <label for="">Category name:</label>
                            <select name="category_id" id="category_id"  class="category form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option @isset($attribute){{$attribute->category_id==$category->id ? 'selected':''}}@endisset value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">attribute Name:</label>
                            <input type="text" name="name" id="name" placeholder="Write attribute name" class="form-control @error('name') is-invalid @enderror" value="{{ $attribute->name ?? old('name') }}" required autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button class="mt-1 btn btn-primary">
                                @isset($attribute)
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