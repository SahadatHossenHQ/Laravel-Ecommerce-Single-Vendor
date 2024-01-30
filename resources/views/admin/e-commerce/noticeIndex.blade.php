@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
                <h1>Setting - <small>Header</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Application Settings</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-8 offset-md-2">
                    <!-- Default box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Custom Header Code</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="type" value="11">
                                <div class="form-group col-md-12">
                                    <label for="NOTICE_STATUS" class="text-capitalize">NOTICE STATUS</label>
                                    <select name="NOTICE_STATUS" id="NOTIC_STATUS">
                                        @if ($NOTICE_STATUS->value == 1)
                                        <option value="1">ON</option>
                                        <option value="0">OFF</option>
                                        @else
                                        <option value="0">OFF</option>
                                        <option value="1">ON</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="CUSTOM_NOTICE" class="text-capitalize">CUSTOM NOTICE</label>
                                    <textarea name="CUSTOM_NOTICE" id="CUSTOM_NOTICE" rows="4"
                                        class="form-control ">{{ $CUSTOM_NOTICE->value }} </textarea>
                                </div>
                            </div>

                            
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>



</section>
<!-- /.content -->

@endsection
