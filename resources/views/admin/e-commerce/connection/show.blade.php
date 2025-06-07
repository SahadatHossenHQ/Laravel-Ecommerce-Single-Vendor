@extends('layouts.admin.e-commerce.app')

@section('title', 'mails List')

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
                <h1>mails List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">mails List</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card" style="background:transparent;">
       
        <!-- /.card-header -->
        <div class="card-body">
       		<table>
       			<tr>
       				<th>Name :</th>
       				<td>{{$mail->name}}</td>
       			</tr>
       			<tr>
       				<th>Email :</th>
       				<td>{{$mail->email}}</td>
       			</tr>
       			<tr>
       				<th>Phone :</th>
       				<td>{{$mail->phone}}</td>
       			</tr>
       			<tr>
       				<th>Subject :</th>
       				<td>{{$mail->title}}</td>
       			</tr>
       			<tr>
       				<th>Body :</th>
       				<td>{{$mail->body}}</td>
       			</tr>
       			@if(!empty($mail->meet))
       			<tr>
       				<th>Meet Time :</th>
       				<td>{{$mail->meet}}</td>
       			</tr>
       			@endif
       			<tr>
       				<th>Photo :</th>
       				
       			</tr>
       			<tr><td><img src="{{asset('/')}}uploads/contact/{{$mail->documents}}"></td></tr>
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