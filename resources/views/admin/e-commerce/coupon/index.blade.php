@extends('layouts.admin.e-commerce.app')

@section('title', 'Coupon List')

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
                <h1>Coupon List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Coupon List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Coupon List</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('coupon/create')}}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i>
                        Add Coupon
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
                        <th>Coupon Code</th>
                        <th>Discount Type</th>
                        <th>Charge</th>
                        <th>User Limit</th>
                        <th>Total Limit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->code}}</td>
                            <td>{{$data->discount_type}}</td>
                            <td>
                                @if ($data->discount_type == 'percent')
                                    {{$data->discount.' %'}}
                                @else
                                    {{$data->discount.' tk'}}
                                @endif
                            </td>
                            <td>{{$data->limit_per_user}}</td>
                            <td>{{$data->total_use_limit}}</td>
                            <td>
                                @if ($data->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Disable</span>
                                @endif  
                            </td>
                            <td>
                                <a href="{{ routeHelper('coupon/'.$data->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ routeHelper('coupon/'.$data->id.'/edit') }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="javascript:void(0)" data-id="{{$data->id}}" id="deleteData" class="btn btn-danger btn-sm"">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>
                                <form id="delete-data-form-{{$data->id}}" action="{{ routeHelper('coupon/'. $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Coupon Code</th>
                        <th>Discount Type</th>
                        <th>Charge</th>
                        <th>User Limit</th>
                        <th>Total Limit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
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