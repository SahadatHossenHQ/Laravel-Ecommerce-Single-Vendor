@extends('layouts.admin.e-commerce.app')

@section('title', 'Color Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Color Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Show Color</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Color Information</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('color/'.$color->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('color')}}" class="btn btn-danger">
                        
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
                        <th width="15%">Color Name</th>
                        <td width="85%">{{$color->name}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Color Code</th>
                        <td width="85%">{{$color->code}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Color Overview</th>
                        <td width="85%">
                            <div style="width:50%;height:50px;background:{{$color->code}}"></div>    
                        </td>
                    </tr>
                    <tr>
                        <th width="15%">Description</th>
                        <td width="85%">{{$color->description}}</td>
                    </tr>
                    <tr>
                        <th width="15%">Status</th>
                        <td width="85%">
                            @if ($color->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Disable</span>
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