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
                                <div class="col-md-12">
                                    <input type="hidden" name="type" value="8">
                                    <ul class="form-row">
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="SITE_INFO_ADDRESS" class="text-capitalize">Company full address <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="SITE_INFO_ADDRESS" id="SITE_INFO_ADDRESS" placeholder="Company Full Address" value="{{ $SITE_INFO_ADDRESS->value }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="SITE_INFO_PHONE" class="text-capitalize">Company primary phone <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="SITE_INFO_PHONE" id="SITE_INFO_PHONE" placeholder="Company Primary Phone" value="{{ $SITE_INFO_PHONE->value }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="SITE_INFO_SUPPORT_MAIL" class="text-capitalize">Company suupport mail <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="SITE_INFO_SUPPORT_MAIL" id="SITE_INFO_SUPPORT_MAIL" placeholder="Company Support Email" value="{{ $SITE_INFO_SUPPORT_MAIL->value }}">
                                        </li>
                                        <li class="col-12 col-md-6">
                                            <label for="copy_right_text" class="text-capitalize">Copyright Text <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="copy_right_text" id="copy_right_text" placeholder="Company Support Email" value="{{ setting('copy_right_text') ?? '© Lems Copyright' }}">
                                        </li>
                                        <li class="col-12 col-md-12">
                                            <label for="footer_description" class="text-capitalize">Footer Descripttion <span class="text-red">(*)</span></label>
                                            <textarea name="footer_description" id="footer_description" rows="4"
                                                class="form-control">{{setting('footer_description') ?? 'Footer Description, Example: This is Lems by Finvasoft'}}</textarea>
                                        </li>
                                    </ul>

                                    <hr>
                                    <ul class="form-row">
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="whatsapp" class="text-capitalize">WhatsApp</label>
                                            <input class="form-control" type="number" name="whatsapp" id="whatsapp" placeholder="8801721600688" value="{{ setting('whatsapp') ?? '01721*****88' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <small class="text-red">With Country Code (Without + sign),<br>Example: 8801721600688,<br>There first 880 is contry code</small>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="facebook" class="text-capitalize">Facebook</label>
                                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ setting('facebook') ?? 'https://facebook.com/finvasoft' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="messanger" class="text-capitalize">Messanger</label>
                                            <input class="form-control" type="text" name="messanger" id="messanger" value="{{ setting('messanger') ?? 'https://m.me/finvasoft' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="linkedin" class="text-capitalize">Linkedin</label>
                                            <input class="form-control" type="text" name="linkedin" id="linkedin" value="{{ setting('linkedin') ?? 'https://linkedin.com/in/asifulmamun' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="twitter" class="text-capitalize">Twitter</label>
                                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ setting('twitter') ?? 'https://twitter.com/asifulmamun' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="youtube" class="text-capitalize">Youtube</label>
                                            <input class="form-control" type="text" name="youtube" id="youtube" value="{{ setting('youtube') ?? 'https://youtube.com/@asifulmamun' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="instagram" class="text-capitalize">Instagram</label>
                                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ setting('instagram') ?? 'https://instagram.com/asifulmamun' }}">
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

{{-- @push('css')
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
@endpush --}}