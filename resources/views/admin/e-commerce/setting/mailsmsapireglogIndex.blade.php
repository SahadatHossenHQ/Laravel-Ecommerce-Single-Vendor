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
            <h3 class="card-title">LOGIN REGISTRATION OPTION CHOOSE</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8 offset-md-2">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Login Registration Option Choose</h3>
                        </div>
                        <form id="email_config" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="type" value="7">
                                    <ul>
                                        <li>
                                            <label for="regVerify" class="text-capitalize">Registration verify With</label>
                                            <select name="regVerify" id="regVerify">
                                                @if (setting('regVerify') == 'email') 
                                                    <option value="email">Only Email</option>
                                                    <option value="sms">Only SMS</option>
                                                @else
                                                    <option value="sms">Only SMS</option>
                                                    <option value="email">Only Email</option>
                                                @endif
                                            </select>
                                            <small class="text-primary">Selected: {{ Str::upper(setting('regVerify')) }}</small>
                                        </li>
                                        <li>
                                            <label for="recovrAC" class="text-capitalize">Account recover with</label>
                                            <select name="recovrAC" id="recovrAC">
                                                @if (setting('recovrAC') == 'email')    
                                                    <option value="email">Only Email</option>
                                                    <option value="sms">Only SMS</option>
                                                    <option value="emailsms">Email & SMS both</option>
                                                @elseif (setting('recovrAC') == 'sms')
                                                    <option value="sms">Only SMS</option>
                                                    <option value="email">Only Email</option>
                                                    <option value="emailsms">Email & SMS both</option>
                                                @else
                                                    <option value="emailsms">Email & SMS both</option>
                                                    <option value="email">Only Email</option>
                                                    <option value="sms">Only SMS</option>
                                                @endif
                                            </select>
                                            <small class="text-primary">Selected: {{ Str::upper(setting('recovrAC')) }}</small>
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

{{-- Mail config --}}
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
                                    <input type="hidden" name="type" value="5">
                                    {{-- <input type="hidden" name="mail_config" value="0"> --}}
                                    <input type="hidden" name="MAIL_DRIVER" value="smtp">
                                    <ul>
                                        <li>
                                            <label for="mail_config" class="text-capitalize">Mail Configuration</label>
                                            <select name="mail_config" id="mail_config">
                                                @if (setting('mail_config') == 1)    
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                @else
                                                <option value="0">OFF</option>
                                                <option value="1">ON</option>
                                                @endif
                                            </select>
                                        </li>
                                        <li>
                                            <label for="MAIL_HOST" class="text-capitalize">Email Host</label>
                                            <input type="text" name="MAIL_HOST" id="MAIL_HOST" value="{{ setting('MAIL_HOST') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="MAIL_PORT" class="text-capitalize">Port</label>
                                            <input type="text" name="MAIL_PORT" id="MAIL_PORT" value="{{ setting('MAIL_PORT') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="MAIL_USERNAME" class="text-capitalize">Username</label>
                                            <input type="text" name="MAIL_USERNAME" id="MAIL_USERNAME" value="{{ setting('MAIL_USERNAME') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="MAIL_PASSWORD" class="text-capitalize">Password</label>
                                            <input type="text" name="MAIL_PASSWORD" id="MAIL_PASSWORD" value="{{ setting('MAIL_PASSWORD') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="MAIL_ENCRYPTION" class="text-capitalize">Encryption Type</label>
                                            <select name="MAIL_ENCRYPTION" id="MAIL_ENCRYPTION">
                                                @if (setting('MAIL_ENCRYPTION') == 'tls')    
                                                    <option value="tls">TLS</option>
                                                    <option value="ssl">SSL</option>
                                                @else
                                                <option value="ssl">SSL</option>
                                                <option value="tls">TLS</option>
                                                @endif
                                            </select>
                                            <small class="text-primary">Selected: {{ Str::upper(setting('MAIL_ENCRYPTION')) }}</small>
                                        </li>
                                        <li>
                                            <label for="MAIL_FROM_ADDRESS" class="text-capitalize">Mail From</label>
                                            <input type="email" name="MAIL_FROM_ADDRESS" id="MAIL_FROM_ADDRESS" value="{{ setting('MAIL_FROM_ADDRESS') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="MAIL_FROM_NAME" class="text-capitalize">From Name</label>
                                            <input type="text" name="MAIL_FROM_NAME" id="MAIL_FROM_NAME" value="{{ setting('MAIL_FROM_NAME') }}">
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

{{-- SMS Config --}}
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">SMS Configuration</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8 offset-md-2">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - SMS configuration</h3>
                        </div>
                        <form id="sms_config" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <input type="hidden" name="type" value="6">
                                    <ul>
                                        <li>
                                            <small style="color:red;">Purchase SMS and configure from: <a href="https://bulksmsbd.com/" target="_blank" rel="noopener noreferrer">www.bulksmsbd.com</a></small>
                                        </li>
                                        <li>
                                            <label for="sms_config_status" class="text-capitalize">SMS Configuration</label>
                                            <select name="sms_config_status" id="sms_config_status">
                                                @if (setting('sms_config_status') == 1)    
                                                    <option value="1">ON</option>
                                                    <option value="0">OFF</option>
                                                @else
                                                <option value="0">OFF</option>
                                                <option value="1">ON</option>
                                                @endif
                                            </select>
                                        </li>
                                        <li>
                                            <label for="SMS_API_URL" class="text-capitalize">SMS API URL</label>
                                            <input type="text" name="SMS_API_URL" id="SMS_API_URL" value="{{ setting('SMS_API_URL') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="SMS_API_KEY" class="text-capitalize">SMS API KEY</label>
                                            <input type="text" name="SMS_API_KEY" id="SMS_API_KEY" value="{{ setting('SMS_API_KEY') ?? '' }}">
                                        </li>
                                        <li>
                                            <label for="SMS_API_SENDER_ID" class="text-capitalize">SENDER ID</label>
                                            <input type="text" name="SMS_API_SENDER_ID" id="SMS_API_SENDER_ID" value="{{ setting('SMS_API_SENDER_ID') }}">
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