@extends('layouts.admin.e-commerce.app')

@section('title', 'Category Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Show Category</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card" style="background:transparent;">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Category Information</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('category/'.$category->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('category')}}" class="btn btn-danger">
                        
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <th>Cover Photo</th>
                        <td>
                            @if ($category->cover_photo == 'default.png')
                                <img src="https://via.placeholder.com/150" alt="Cover Photo" width="150px" height="150px"> 
                            @else
                                <img src="/uploads/category/{{$category->cover_photo}}" alt="Cover Photo" width="150px" height="150px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$category->name}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$category->description}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($category->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Disable</span>
                            @endif    
                        </td>
                    </tr>
                     <tr>
                        <th>is_features</th>
                        <td>
                            @if ($category->is_feature)
                                <span class="badge badge-success">Yes</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif    
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection