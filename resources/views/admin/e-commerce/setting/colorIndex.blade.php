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
                                            <input type="color" id="PRIMARY_COLOR_CHOOSER" value="{{ $PRIMARY_COLOR->value }}">
                                            <input type="text" id="PRIMARY_COLOR" name="PRIMARY_COLOR" value="{{ $PRIMARY_COLOR->value }}">
                                        </li>
                                        <li>
                                            <label for="PRIMARY_BG_TEXT_COLOR" class="text-capitalize">Primary Background Text Color: </label>
                                            <input type="color" id="PRIMARY_BG_TEXT_COLOR_CHOOSER" value="{{ $PRIMARY_BG_TEXT_COLOR->value }}">
                                            <input type="text" id="PRIMARY_BG_TEXT_COLOR" name="PRIMARY_BG_TEXT_COLOR" value="{{ $PRIMARY_BG_TEXT_COLOR->value }}">
                                        </li>
                                        <li>
                                            <label for="SECONDARY_COLOR" class="text-capitalize">Secnodary Color: </label>
                                            <input type="color" id="SECONDARY_COLOR_CHOOSER" value="{{ $SECONDARY_COLOR->value }}">
                                            <input type="text" id="SECONDARY_COLOR" name="SECONDARY_COLOR" value="{{ $SECONDARY_COLOR->value }}">
                                        </li>
                                        <li>
                                            <label for="OPTIONAL_COLOR" class="text-capitalize">Optional Color: </label>
                                            <input type="color" id="OPTIONAL_COLOR_CHOOSER" value="{{ $OPTIONAL_COLOR->value }}">
                                            <input type="text" id="OPTIONAL_COLOR" name="OPTIONAL_COLOR" value="{{ $OPTIONAL_COLOR->value }}">
                                        </li>
                                        <li>
                                            <label for="OPTIONAL_BG_TEXT_COLOR" class="text-capitalize">Optional Background Text Color: </label>
                                            <input type="color" id="OPTIONAL_BG_TEXT_COLOR_CHOOSER" value="{{ $OPTIONAL_BG_TEXT_COLOR->value }}">
                                            <input type="text" id="OPTIONAL_BG_TEXT_COLOR" name="OPTIONAL_BG_TEXT_COLOR" value="{{ $OPTIONAL_BG_TEXT_COLOR->value }}">
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
        $("#PRIMARY_COLOR_CHOOSER").on("input", function () {
            $("#PRIMARY_COLOR").val($(this).val());
        });
        $("#PRIMARY_COLOR").on("keyup", function () {
            $("#PRIMARY_COLOR_CHOOSER").val($(this).val());
        });

        $("#PRIMARY_BG_TEXT_COLOR_CHOOSER").on("input", function () {
            $("#PRIMARY_BG_TEXT_COLOR").val($(this).val());
        });
        $("#PRIMARY_BG_TEXT_COLOR").on("keyup", function () {
            $("#PRIMARY_BG_TEXT_COLOR_CHOOSER").val($(this).val());
        });

        $("#SECONDARY_COLOR_CHOOSER").on("input", function () {
            $("#SECONDARY_COLOR").val($(this).val());
        });
        $("#SECONDARY_COLOR").on("keyup", function () {
            $("#SECONDARY_COLOR_CHOOSER").val($(this).val());
        });

        $("#OPTIONAL_COLOR_CHOOSER").on("input", function () {
            $("#OPTIONAL_COLOR").val($(this).val());
        });
        $("#OPTIONAL_COLOR").on("keyup", function () {
            $("#OPTIONAL_COLOR_CHOOSER").val($(this).val());
        });

        $("#OPTIONAL_BG_TEXT_COLOR_CHOOSER").on("input", function () {
            $("#OPTIONAL_BG_TEXT_COLOR").val($(this).val());
        });
        $("#OPTIONAL_BG_TEXT_COLOR").on("keyup", function () {
            $("#OPTIONAL_BG_TEXT_COLOR_CHOOSER").val($(this).val());
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

