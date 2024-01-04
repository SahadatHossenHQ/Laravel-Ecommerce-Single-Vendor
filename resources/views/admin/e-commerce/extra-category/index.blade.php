@extends('layouts.admin/e-commerce.app')

@section('title', 'mini Category List')

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
                <h1>mini Category List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Category List</li>
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
                    <h3 class="card-title">mini Category List</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('admin.extracategory')}}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i>
                        Add extra Category
                    </a>
                </div>
            </div>
        </div>
        @if(!empty(Session::get('massage2')))
                    <span style="margin-bottom: 20px;display: block;color: #1cc88a;text-align: center;background: white;padding: 5px;border-radius: 5px;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1) !important;"> {{ Session::get('massage2')}}</span>
                    @endif
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Cover Photo</th>
                        <th>Category Name</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mini_categories as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>
                                @if ($data->cover_photo == 'default.png')
                                    <img src="https://via.placeholder.com/150" alt="Cover Photo" width="60px">
                                @else
                                    <img src="/uploads/extra-category/{{$data->cover_photo}}" alt="Cover Photo" width="60px">
                                @endif
                                    
                            </td>
                             <td><?php if(!empty($data->miniCategory->name)){echo $data->miniCategory->name;}?></td>
                            <td>{{$data->name}}</td>
                            <td>
                                @if ($data->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Disable</span>
                                @endif  
                            </td> 
                            <td>
                                 <a href="{{routeHelper('ex-category/product/'.$data->id)}}" class="btn btn-success btn-sm">
                                    <i class="fas fa-box"></i>
                                </a>
                                <a href="{{route('admin.extracategory.edit',['edit'=>$data->id])}}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{route('admin.extracategory.delete',['did'=>$data->id])}}"   class="btn btn-danger btn-sm"">
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