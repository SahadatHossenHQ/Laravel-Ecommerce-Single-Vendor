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
            <h3 class="card-title">Application Layout</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-sm-8 offset-md-2">
                    <!-- Default box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Layout Change</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="layoutForm" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <input type="hidden" name="type" value="9">
                                <div class="form-group col-md-12">
                                    <ul>
                                        <li class="heading"><b>Global Layout</b></li>
                                        <li>
                                            <label for="MAIN_MENU_STYLE" class="text-capitalize">Main Menu Style: </label>
                                            <select name="MAIN_MENU_STYLE" id="MAIN_MENU_STYLE">
                                                <option value="{{ $MAIN_MENU_STYLE->value }}">Style {{ $MAIN_MENU_STYLE->value }}</option>
                                                <option value="1">Style 1</option>
                                                <option value="2">Style 2</option>
                                            </select><small style="text-danger"><b>Selected</b> Style {{ $MAIN_MENU_STYLE->value }}</small>
                                        </li>

                                        <li class="heading"><b>Home Layout</b></li>
                                        <li>
                                            <label for="SLIDER_LAYOUT" class="text-capitalize">Slider Layout: </label>
                                            <select name="SLIDER_LAYOUT" id="SLIDER_LAYOUT">
                                                <option value="{{ $SLIDER_LAYOUT->value }}">Style {{ $SLIDER_LAYOUT->value }}</option>
                                                <option value="1">Style 1 - Container</option>
                                                <option value="2">Style 2 - Full Width</option>
                                            </select><small style="text-danger"><b>Selected</b> Style {{ $SLIDER_LAYOUT->value }}</small>
                                        </li>
                                        <li>
                                            <label for="SLIDER_LAYOUT" class="text-capitalize">Slider Layout: </label>

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

@push('css')
<style>
    form#layoutForm ul li.heading{
        background: var(--MAIN_MENU_BG);
        color: var(--primary_bg_color_text);
        padding: 0.5rem;
        font-size: 18px;
        text-transform: uppercase;
        margin-top: 2rem;
        margin-bottom: 0.7rem;
    }

    form#layoutForm ul li{
        list-style-type: none;
        padding: .5rem .3rem;
    }
    form#layoutForm input[type="color"],
    form#layoutForm select{
        cursor: pointer;
    }
</style>    
@endpush

