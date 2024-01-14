@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
                <h1>Setting - <small>Color</small></h1>
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
                            <h3 class="card-title">Setting - Color Change</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="color_form" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="type" value="4">
                                <div class="form-group col-md-12">
                                    <ul>
                                        <li>
                                            <label for="PRIMARY_COLOR" class="text-capitalize">Primary Color: </label>
                                            <input type="color" id="PRIMARY_COLOR_CHOSER" value="{{ $PRIMARY_COLOR->value }}">
                                            <input type="text" id="PRIMARY_COLOR" name="PRIMARY_COLOR" value="{{ $PRIMARY_COLOR->value }}">
                                        </li>
                                    </ul>
                                </div>
                                <hr>
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

@push('js')
<script>
    $(document).ready(function () {
        // Listen for input event on color chooser
        $("#PRIMARY_COLOR_CHOSER").on("input", function () {
            // Update the value of PRIMARY_COLOR with the chosen color
            $("#PRIMARY_COLOR").val($(this).val());
        });

        // Listen for input event on text input
        $("#PRIMARY_COLOR").on("keyup", function () {
            // Update the value of PRIMARY_COLOR_CHOSER with the text input value
            $("#PRIMARY_COLOR_CHOSER").val($(this).val());
        });
    });
</script>
@endpush

@push('css')
<style>
    form#color_form ul li{
        list-style-type: none;
    }

    form#color_form input[type="color"]{
        cursor: pointer;
    }
</style>    
@endpush

