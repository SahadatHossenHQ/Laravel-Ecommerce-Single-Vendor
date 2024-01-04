@extends('layouts.admin.e-commerce.app')

@section('title', 'Partials Pay List')

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
                <h1>Partials Pay List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Partials Pay List</li>
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
                    <h3 class="card-title">Partials Pay List</h3>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                        <tr>
                            <th>NO.</th>
                            <th>Invoice</th>
                            <th>amount</th>
                            <th>tnx</th>
                            <th>method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partials as $key => $order)
                        <tr>
                            <td>{{$key+1}}</td>
                           
                            <td>{{$order->order->invoice??''}}</td>
                             <td>{{$order->amount}}</td>
                            <td>{{$order->transaction_id}}</td>
                            <td>
                                @if($order->payment_method=='bk')
                                Bkash
                                @elseif($order->payment_method=='ng')
                                Nagad
                                @elseif($order->payment_method=='rk')
                                Rocket
                                @endif
                            </td>
                            <td>
                                @if($order->status==1)
                                Aprove
                                @elseif($order->status==2)
                                Cancel
                                @else
                                Pending
                                @endif
                            </td>
                            <td>
                                @if($order->status==0)
                                <a href="{{route('admin.order.partials.status',['id'=>$order->id,'st'=>'1'])}}" class="btn-sm btn-success ">
                                    <i  class="fas fa-thumbs-up"></i>
                                </a>
                                <li style="display:inline-block;"></li>
                                <a href="{{route('admin.order.partials.status',['id'=>$order->id,'st'=>'2'])}}"  class="btn-sm btn-danger ">
                                    <i  class="fas fa-times"></i>
                                </a>
                                @elseif($order->status==1)
                              
                                 @elseif($order->status==2)
                                 <a href="{{route('admin.order.partials.status',['id'=>$order->id,'st'=>'1'])}}" class="btn-sm btn-success ">
                                    <i  class="fas fa-thumbs-up"></i>
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