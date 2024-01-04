@extends('layouts.vendor.app')

@section('title', 'Order List')

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
                <h1>Order List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Order List</li>
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
                    <h3 class="card-title">Order List</h3>
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $data)
                        @php
                           $order_dt=DB::table('multi_order')->where('order_id',$data->id)->where('vendor_id',auth()->id())->first();
                        @endphp
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->first_name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->payment_method}}</td>
                            <td>{{$order_dt->total}}</td>
                            <td>{{$order_dt->discount}}</td>
                            <td>{{$order_dt->total-$order_dt->discount}}</td>
                            <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                            <td>
                                @if ($data->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($data->status == 1)
                                    <span class="badge badge-primary">Processing</span>
                                @elseif ($data->status == 2)
                                <span class="badge badge-danger">Canceled</span>
                                 @elseif ($data->status == 5)
                                    <span class="badge badge-danger">refund</span>
                                     @elseif ($data->status == 4)
                                    <span class="badge badge-primary">shipping</span>
                                    
                                @else 
                                    <span class="badge badge-success">Delivered</span>
                                @endif  
                            </td>
                            <td>
                                <div class="btn btn-group">
                                    <a title="Invoice" href="{{route('vendor.order.invoice', $data->id)}}" class="btn btn-warning btn-sm" target="_blank">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <a title="Show Information" href="{{routeHelper('order/'. $data->id)}}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                  <!--   @if ($data->status == 0)
                                    <a title="Processing" href="{{routeHelper('order/status/processing/'. $data->id)}}" id="btnStatus" onclick="return confirm('Are you sure change this order status?')" class="btn btn-primary btn-sm">
                                        <i class="fas fa-running"></i>
                                    </a>
                                    <a title="Cancel" href="{{routeHelper('order/status/cancel/'. $data->id)}}" id="btnCancel" onclick="return confirm('Are you sure cancel this order?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-window-close"></i>
                                    </a>
                                    <a title="Delivered" href="{{routeHelper('order/status/delivered/'. $data->id)}}" id="btnDelivered" onclick="return confirm('Are you sure delivered this order?')" class="btn btn-success btn-sm">
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                    @elseif ($data->status == 1)
                                        <a title="Cancel" href="{{routeHelper('order/status/cancel/'. $data->id)}}" id="btnCancel" onclick="return confirm('Are you sure cancel this order?')" class="btn btn-danger btn-sm">
                                            <i class="fas fa-window-close"></i>
                                        </a>
                                        <a title="Delivered" href="{{routeHelper('order/status/delivered/'. $data->id)}}" id="btnDelivered" onclick="return confirm('Are you sure delivered this order?')" class="btn btn-success btn-sm">
                                            <i class="fas fa-thumbs-up"></i>
                                        </a>
                                    @endif -->
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