@extends('layouts.admin.e-commerce.app')

@section('title', 'Cancel Order List')

@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cancel Order List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cancel Order List</li>
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
                    <h3 class="card-title">Cancel Order List</h3>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Payment</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->first_name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->payment_method}}</td>
                            <td>{{$data->subtotal}}</td>
                            <td>{{$data->discount}}</td>
                            <td>{{$data->total}}</td>
                            <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                            <td>
                                <div class="btn-group">
                                    <a title="Invoice" href="{{route('admin.order.invoice', $data->id)}}" class="btn btn-warning btn-sm" target="_blank">
                                        <i class="fas fa-print"></i>
                                    </a>
                                     <a title="Done" href="{{routeHelper('order/status/processing/'. $data->id)}}" id="btnStatus" onclick="return confirm('Are you sure change this order status?')" class="btn btn-primary btn-sm">
                                        <i class="fas fa-check"></i>
                                    </a>
                                    <a href="{{route('admin.order.delete',['did'=>$data->id])}}"   class="btn btn-danger btn-sm">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>
                                    <a title="Show Information" href="{{routeHelper('order/'. $data->id)}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
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
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function () { 
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        
        })
    </script>
@endpush