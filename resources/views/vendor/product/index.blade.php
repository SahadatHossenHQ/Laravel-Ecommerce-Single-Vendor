@extends('layouts.vendor.app')

@section('title', 'Product List')

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
                <h1>Product List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product List</li>
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
                    <h3 class="card-title">Product List</h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('product/create')}}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i>
                        Add Product
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
                        <th>Image</th>
                        <th>Title</th>
                        <th>RP</th>
                        <th>DP</th>
                        <th>Stock</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $data)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>
                                <img src="{{asset('uploads/product/'.$data->image)}}" alt="Product Image" width="60px">    
                            </td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->regular_price}}</td>
                            <td>{{$data->discount_price}}</td>
                            <td>
                                @if ($data->quantity > 0)
                                <span class="badge badge-success">Available</span>
                                @else
                                <span class="badge badge-danger">Unavailable</span>
                                @endif    
                            </td>
                            <td>{{$data->brand->name ?? ''}}</td>
                            <td>
                                @if ($data->status)
                                    <span class="badge badge-success">Active</span>
                                    @if($data->is_aproved==1)
                                    <span class="badge badge-success">Approved</span>
                                    @else
                                    <span class="badge badge-danger">Unapproved</span>
                                    @endif
                                @else
                                    <span class="badge badge-danger">Pending</span>
                                    @if($data->is_aproved==1)
                                    <span class="badge badge-success">Approved</span>
                                    @else
                                    <span class="badge badge-danger">Unapproved</span>
                                    @endif
                                @endif  
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('vendor.product.order', $data->id) }}" title="Order Product" class="btn btn-primary btn-sm">
                                        <i class="fab fa-jedi-order"></i>
                                    </a>
                                    @if($data->is_aproved==1)
                                        @if ($data->status)
                                        <a title="Disable" href="{{ routeHelper('product/status/'.$data->id) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-thumbs-up"></i>
                                        </a> 
                                        @else
                                        <a title="Active" href="{{ routeHelper('product/status/'.$data->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a> 
                                        @endif
                                    @endif
                                    <a href="{{ routeHelper('product/'. $data->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ routeHelper('product/'.$data->id.'/edit') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-id="{{$data->id}}" id="deleteData" class="btn btn-danger btn-sm"">
                                        <i class="nav-icon fas fa-trash-alt"></i>
                                    </a>
                                    <form id="delete-data-form-{{$data->id}}" action="{{ routeHelper('product/'. $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                                

                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>RP</th>
                        <th>DP</th>
                        <th>Stock</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results
                {{-- {{ $products->total() }} --}}
                {{-- <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if ($products->previousPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">Prev</span>
                                </a>
                            </li>
                        @endif
                
                        @if ($products->nextPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                        @endif
                    </ul> --}}
                    <ul class="pagination">
                        {{-- First Page Button --}}
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->url(1) }}">First</a>
                        </li>
                
                        {{-- Page Numbers --}}
                        @php
                            $totalPages = ceil($products->total() / $products->perPage());
                            $currentPage = $products->currentPage();
                            $middlePage = floor($totalPages / 2);
                        @endphp
                
                        @if ($totalPages > 3)
                            {{-- Immediate two pages before the first page --}}
                            @for ($i = max($currentPage - 2, 2); $i < $currentPage; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                
                            {{-- Current Page --}}
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $currentPage }}</a>
                            </li>
                
                            {{-- Immediate two pages after the last page --}}
                            @for ($i = $currentPage + 1; $i <= min($currentPage + 2, $totalPages - 1); $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                
                            {{-- Last Page Button --}}
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->url($totalPages) }}">Last</a>
                            </li>
                        @else
                            {{-- Page Numbers if total pages are less than or equal to 3 --}}
                            @for ($i = 2; $i < $totalPages; $i++)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                        @endif

                        @if ($products->nextPageUrl())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
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
                "responsive": true,
                // "lengthChange": false,
                "paging": false, // Disable pagination
                "info": false, // Hide information element
                "searching": false, // Hide search input
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
    </script>
@endpush