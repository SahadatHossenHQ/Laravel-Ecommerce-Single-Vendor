@extends('layouts.admin/e-commerce.app')

@section('title', 'Blogs List')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Blogs List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Blogs List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card" style="background:transparent;">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Blogs List</h3>
                </div>
                <div class="col-sm-6 text-right">
                   
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        @if($is==1)
                        <th>User</th>
                        @endif
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            @if($is==1)
                            <td><a href="customer/{{$data->user_id}}">{{$data->user->name}}</a></td>
                            @endif
                            <td>{{$data->title}}</td>
                            <td>
                                @if($data->status==1)
                                <span class="btn-success" style="padding: 5px;border-radius: 5px;font-size: 14px;">Active</span>
                                @else
                                <span class="btn-danger" style="padding: 5px;border-radius: 5px;font-size: 14px;">Dective</span>
                                @endif
                            </td>
                           
                            <td>
                                @if ($data->status)
                                <a href="{{routeHelper('blog/status/'.$data->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-thumbs-up"></i>
                                </a>
                                @else
                                <a href="{{routeHelper('blog/status/'.$data->id)}}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                @endif
                                <a href="{{routeHelper('blog-edit/'.$data->id)}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="javascript:void(0)" data-id="{{$data->id}}" id="deleteData" class="btn btn-danger btn-sm"">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>
                                <form id="delete-data-form-{{$data->id}}" action="{{ routeHelper('blog-delete/'. $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
      <!-- /.card -->    

</section>
<!-- /.content -->

@endsection

@push('js')
    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () { 
            $("#example1").DataTable();
        })
    </script>
@endpush