@extends('layouts.frontend.app')


@section('title', 'Account')
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
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$data->title}}</td>
                            <td>
                                @if($data->status==1)
                                <span class="btn-success" style="padding: 5px;border-radius: 5px;font-size: 14px;">Active</span>
                                @else
                                <span class="btn-danger" style="padding: 5px;border-radius: 5px;font-size: 14px;">Dective</span>
                                @endif
                            </td>
                           
                            <td>
                              
                                <a href="{{route('ads.edit',['ads'=>$data->id])}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="javascript:void(0)" data-id="{{$data->id}}" id="deleteData" class="btn btn-danger btn-sm"">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </a>
                                <form id="delete-data-form-{{$data->id}}" action="{{route('ads.delete',['ads'=>$data->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </td>
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
         $(document).on('click', '#deleteData', function(e) {
                let id = $(this).data('id');
                e.preventDefault();
                let conf = confirm('Are you sure delete this data!!');
                if (conf) {
                    
                    document.getElementById('delete-data-form-'+id).submit();
                }
                
            })
        $(function () { 
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
    </script>
@endpush