@extends('layouts.admin.e-commerce.app')

@section('title', 'Withdraw List')

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
                <h1>Withdraw List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Withdraw List</li>
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
                         <th>Method</th>
                        <th>Amount</th>
                        <th>Account</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($withdraws as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                             <td>{{$data->user->name}}</td>
                            <td>
                            	@php
                            	if($data->payment_method==1){
                            			echo 'Bkash';
                                         $method='bkash';
                            	}elseif($data->payment_method==2){
                            			echo 'Nagad';
                                        $method='nogod';
                            	}elseif($data->payment_method==3){
                            			echo 'Rocket';
                                        $method='rocket';
                            	}elseif($data->payment_method==4){
                                        echo 'Mobile Recharge';
                                }
                                else{
                            		echo 'Bank';
                                    $method='bank';

                            	}
                            	@endphp
                            </td>
                             <td>{{$data->amount}}</td>
                            <td>{{$data->number != null ? $data->number : $data->user->shop_info->$method}}</td>
                            <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                            <td>
                                @if ($data->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($data->status == 1)
                                    <span class="badge badge-primary">Complete</span>
                                @elseif ($data->status == 2)
                                    <span class="badge badge-danger">Canceled</span>
                                @endif  
                            </td>
                           <td>
                                <!--<a href="{{ routeHelper('vendor/'. $data->user_id) }}" class="btn btn-primary btn-sm">-->
                                <!--    <i class="fas fa-eye"></i>-->
                                <!--</a>-->
                               <a href="{{ route('admin.vendor.withdraw.delete',['id'=>$data->id]) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                @if ($data->status == 0)
                                 <a href="{{ route('admin.vendor.withdraw.aprove',['id'=>$data->id]) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-thumbs-up"></i>
                                </a>
                                <a href="{{ route('admin.vendor.withdraw.cancel',['id'=>$data->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-times"></i>
                                </a>
                                @endif
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
            $("#example1").DataTable();
            

        })
    </script>
@endpush