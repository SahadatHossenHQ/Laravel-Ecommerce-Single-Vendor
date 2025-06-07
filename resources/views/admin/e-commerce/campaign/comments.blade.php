@extends('layouts.admin/e-commerce.app')

@section('title', 'Campaing List')

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
                <h1>Campaing List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Campaing List</li>
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
                    <h3 class="card-title">Campaing List</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.campaing.create')}}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i>
                        Add Campaing
                    </a>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                           
                            <td>{{$data->user_id ? $data->users->name : 'Guest'}}</td>
                            <td>{{$data->user_id ? $data->users->email : 'Guest'}}</td>
                            <td>{{$data->comment}}</td>
                           
                            <td>
                            
                                
                                <a href="javascript:void(0)" data-id="{{$data->id}}" id="deleteData" class="btn btn-danger btn-sm"">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>
                                <form id="delete-data-form-{{$data->id}}" action="{{ routeHelper('campaing/comment/delete/'. $data->id) }}" method="POST">
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