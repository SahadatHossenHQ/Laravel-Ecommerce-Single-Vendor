@extends('layouts.frontend.app')


@section('title', 'My Refer')
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
            <div class="col-md-9" style="margin-top: 20px">
                <div class="custmer-right ">
                <div class="row"  style="background: white;border-radius: 5px;" >
            <div class="col-md-12 customar-menu">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\User::where('refer',auth()->id())->get() as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->name}}</td>
                         
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            </div>
        </div>
                </div>
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