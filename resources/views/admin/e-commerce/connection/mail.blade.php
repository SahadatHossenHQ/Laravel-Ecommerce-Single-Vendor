@extends('layouts.admin.e-commerce.app')

@section('title', 'mails List')

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
                <h1>mails List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">mails List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card">
       
        <!-- /.card-header -->
        <div class="card-body">
        @if(!empty(Session::get('massage2')))
                    <span style="margin-bottom: 20px;display: block;color: #1cc88a;text-align: center;background: white;padding: 5px;border-radius: 5px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;"> {{ Session::get('massage2')}}</span>
                    @endif
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mails as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->title}}</td>
                           
                            <td>
                                
                                <a href="{{route('admin.mail.show',['id'=>$data->id])}}"  class="btn btn-primary btn-sm"">
                                    <i class="nav-icon fas fa-eye"></i>
                                </a>
                                
                                <a href="{{route('admin.mail.delete',['id'=>$data->id])}}"  class="btn btn-danger btn-sm"">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>

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