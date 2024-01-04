@extends('layouts.frontend.app')


@section('title', 'CashOut')
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
  </style>
@endpush
@section('content')

<div class="customar-dashboard">
    <div class="container">
        <div class="customar-access row">
            <div class="customar-menu col-md-3">
                  @include('layouts.frontend.partials.userside')
            </div>
            <div class="col-md-9">
                <div class="card" style="padding: 20px;margin-top: 20px;">
                   <section class="content">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
              <span class="btn-success p-2 text-center"> Minimum Withdaw {{setting('min_with')}} Taka</span>
               <span class="btn-primary p-2 text-center"> Minimum Recharge {{setting('min_rec')}} Taka</span>
                <form action="{{ route('redem.withdraw') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group wsot">
                            <lebel>Method(give personal Number)</lebel>
                            <select name="method" class="form-control" required>
                                
                                 <option value="1">Bkash</option>
                                 <option value="2">Nagad</option>
                                  <option value="3">Rocket</option>
                                  <option value="4">Mobile Recharge</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lebel>Amount</lebel>
                            <input required name="amount" class="form-control" placeholder="enter amount">
                        </div>
                        <div class="form-group">
                            <lebel>Number</lebel>
                            <input required name="number" class="form-control" placeholder="enter number">
                        </div>
                        <input type="submit" name="">
                    </div>
                   
                </form>
                
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- Default box -->
<table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\Withdraw::where('user_id',auth()->id())->get() as $key =>$data)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            @php
                                if($data->payment_method==1){
                                        echo 'Bkash';
                                }elseif($data->payment_method==2){
                                        echo 'Nagad';
                                }elseif($data->payment_method==3){
                                        echo 'Rocket';
                                }else{
                                    echo 'Mobile Recharge';

                                }
                                @endphp
                        </td>
                        <td>{{$data->amount}}</td>
                        <td>{{$data->number}}</td>
                        <td>
                                @if ($data->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($data->status == 1)
                                    <span class="badge badge-primary">Complete</span>
                                @elseif ($data->status == 2)
                                    <span class="badge badge-danger">Canceled</span>
                                @endif  
                            </td>
                    </tr>
                    @endforeach
                </tbody>
              
            </table>
</section>
                </div>
            </div>
        </div>

    </div>
</div>
<style type="text/css">
    .wot{
        display: none;
    }
</style>

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