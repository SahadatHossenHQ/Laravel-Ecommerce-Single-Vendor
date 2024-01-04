@extends('layouts.frontend.app')
 
@push('meta')
<meta name='description' content="Order List"/>
<meta name='keywords' content="E-commerce, Best e-commerce website" />
@endpush

@section('title', 'Order List')
@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
     #example1_wrapper {
        background: white;
padding: 10px;
border-radius: 5px;
      }
      td{
        border-bottom: 1px solid gainsboro;
        padding: 5px 0px;
      }
  </style>
@endpush
@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
               @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9" style="margin-top:20px">
                <table style="margin-top: 20px;background: white;" class="timetable_sub" id="example1">
                    <thead>
                        <tr>
                            <th>Order NO.</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{number_format($order->orderDetails->sum('price'), 2, '.', ',')}}</td>
                            <td>{{$order->orderDetails->sum('qty')}}</td>
                            <td>{{number_format($order->total, 2, '.', ',')}}</td>
                            <td>
                                @if ($order->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($order->status == 1)
                                    <span class="badge badge-primary">Processing</span>
                                @elseif ($order->status == 2)
                                    <span class="badge badge-danger">Canceled</span>
                               @elseif ($order->status == 4)
                                    <span class="badge" style="background: #7db1b1;">Shipping</span>
                                       @elseif ($order->status == 5)
                                    <span class="badge  badge-danger">Refund</span>
                                @else 
                                    <span class="badge badge-success">Delivered</span>
                                @endif  
                            </td>
                            <td>{{date('d M Y', strtotime($order->created_at))}}</td>
                            <td>
                                
                                @if($order->pay_staus!=1 && $order->status != 3  && $order->status != 2)
                                <a class="btn btn-info"  href="{{route('order.pay.form', $order->order_id)}}">Pay</a>
                                 @endif
                                <a class="btn badge-primary" href="{{route('order.invoice', $order->id)}}">View</a>
                                   <!--<form style="display: inline;width: initial !important;"  action="{{route('tracking')}}" method="post">-->
                                   <!--     @csrf-->
                                   <!--     <input type="hidden" value="1" name="pt" />-->
                                   <!--    <input type="hidden" value="{{$order->invoice}}" name="invoice" id="invoice" class="form-control" required />-->
                                          
                                   <!--         <input style="display: inline;width: initial !important;"  class="form-control" type="submit" value="View">-->
                                       
                                   <!-- </form>-->
        

                                @if ($order->status == 0)
                                    <a class="btn btn-warning"  href="{{route('order.cacnel', $order->id)}}">Cancel</a>
                                @endif
                                @if ($order->status == 3)
                                    <a class="btn btn-success" href="{{route('review', $order->order_id)}}">Review</a>
                                @endif
                            </td>
                        </tr>  
                        @endforeach
                         
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
     <script>
        $(function () { 
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
    </script>
@endpush