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

{{-- LOGIN / REG - OPTION --}}
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Site Information</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8 offset-md-2">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Site Information</h3>
                        </div>
                        <form id="email_config" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="type" value="8">
                                    <ul>
                                        <li>
                                            <label for="SITE_INFO_ADDRESS" class="text-capitalize">Company full address</label>
                                            <input type="text" name="SITE_INFO_ADDRESS" id="SITE_INFO_ADDRESS" placeholder="Company Full Address" value="{{ $SITE_INFO_ADDRESS->value }}">
                                        </li>
                                        <li>
                                            <label for="SITE_INFO_PHONE" class="text-capitalize">Company primary phone</label>
                                            <input type="text" name="SITE_INFO_PHONE" id="SITE_INFO_PHONE" placeholder="Company Primary Phone" value="{{ $SITE_INFO_PHONE->value }}">
                                        </li>

                                        <li>
                                            <label for="SITE_INFO_SUPPORT_MAIL" class="text-capitalize">Company suupport mail</label>
                                            <input type="text" name="SITE_INFO_SUPPORT_MAIL" id="SITE_INFO_SUPPORT_MAIL" placeholder="Company Support Email" value="{{ $SITE_INFO_SUPPORT_MAIL->value }}">
                                        </li>

                                        <li>
                                            <label for="COUNTRY_SERVE" class="text-capitalize">Country of Site</label>
                                            <input type="text" name="COUNTRY_SERVE" id="COUNTRY_SERVE" placeholder="Bangladesh" value="{{ setting('COUNTRY_SERVE') ?? 'Bangladesh' }}">
                                        </li>

                                        <li>
                                            <label for="shipping_range_inside" class="text-capitalize">Text - Shipping in Range</label>
                                            <input name="shipping_range_inside" id="shipping_range_inside" class="border border-info p-1" type="text" value="{{ setting('shipping_range_inside') ?? "Dhaka" }}">
                                        </li>

                                        <li>
                                            <label for="CURRENCY_CODE" class="text-capitalize">Currency Code</label>
                                            <input type="text" name="CURRENCY_CODE" id="CURRENCY_CODE" placeholder="Currency code" value="{{ setting('CURRENCY_CODE') ?? 'BDT' }}">
                                        </li>

                                        <li>
                                            <label for="CURRENCY_ICON" class="text-capitalize">Currency Icon</label>
                                            <input type="text" name="CURRENCY_ICON" id="CURRENCY_ICON" placeholder="Currency icon" value="{{ setting('CURRENCY_ICON') ?? '৳' }}">
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
        form ul li input[type="text"],
        form ul li input[type="email"],
        form ul li input[type="password"]{
            border: 1px solid #ccc;
            margin-top: .5rem;
            margin-right: .5rem;
            padding: .4rem;
        }

        form select{
            margin: .5rem;
        }
    </style>
@endpush