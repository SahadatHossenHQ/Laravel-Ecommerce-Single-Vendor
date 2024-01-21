@extends('layouts.admin.e-commerce.app')
@section('title', 'Settings')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
                <h1>Setting - <small>Credintial</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">SMS | Mail | Login | Register Configureation</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Mail Configuration</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8 offset-md-2">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Mail configuration</h3>
                        </div>
                        <form id="email_config" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="type" value="2">
                                    <input type="hidden" name="mail_config" value="0">
                                    <input type="hidden" name="MAIL_DRIVER" value="smtp">
                                    <ul>
                                        <li>
                                            <label for="MAIL_HOST" class="text-capitalize">Email Host</label>
                                            <input type="text" name="MAIL_HOST" id="MAIL_HOST">
                                        </li>
                                        <li>
                                            <label for="MAIL_PORT" class="text-capitalize">Port</label>
                                            <input type="text" name="MAIL_PORT" id="MAIL_PORT">
                                        </li>
                                        <li>
                                            <label for="MAIL_USERNAME" class="text-capitalize">Username</label>
                                            <input type="text" name="MAIL_USERNAME" id="MAIL_USERNAME">
                                        </li>
                                        <li>
                                            <label for="MAIL_PASSWORD" class="text-capitalize">Password</label>
                                            <input type="text" name="MAIL_PASSWORD" id="MAIL_PASSWORD">
                                        </li>
                                        <li>
                                            <label for="MAIL_ENCRYPTION" class="text-capitalize">Ebcryption Type</label>
                                            <select name="MAIL_ENCRYPTION" id="MAIL_ENCRYPTION">
                                                <option value="tls">TLS</option>
                                                <option value="ssl">SSL</option>
                                            </select>
                                        </li>
                                        <li>
                                            <label for="MAIL_FROM_ADDRESS" class="text-capitalize">Mail From</label>
                                            <input type="email" name="MAIL_FROM_ADDRESS" id="MAIL_FROM_ADDRESS">
                                        </li>
                                        <li>
                                            <label for="MAIL_FROM_NAME" class="text-capitalize">From Name</label>
                                            <input type="text" name="MAIL_FROM_NAME" id="MAIL_FROM_NAME">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
    <style>
        form#email_config ul li input[type="text"],
        form#email_config ul li input[type="email"],
        form#email_config ul li input[type="password"]{
            border: 1px solid #ccc;
            margin-top: .5rem;
            margin-right: .5rem;
            padding: .4rem;
        }

        form#email_config select{
            margin: .5rem;
        }
    </style>
@endpush