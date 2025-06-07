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
    <div class="card" style="background:transparent;">
        <div class="card-header">
            <h3 class="card-title">Shop Information</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8 offset-md-2">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting - Shop Information</h3>
                        </div>
                        <form id="email_config" action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="8">
                            <div class="card-body">
                                <div class="col-md-12">

                                    <a class="btn btn-primary" href="{{routeHelper('shop')}}">Update Main Information <i class="fas fa-caret-right"></i></a>
                                    <br><br>

                                    <ul class="form-row">
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="SITE_INFO_ADDRESS" class="text-capitalize">Company full address <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="SITE_INFO_ADDRESS" id="SITE_INFO_ADDRESS" placeholder="Company Full Address" value="{{ $SITE_INFO_ADDRESS->value }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="SITE_INFO_PHONE" class="text-capitalize">Company primary phone <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="SITE_INFO_PHONE" id="SITE_INFO_PHONE" placeholder="Company Primary Phone" value="{{ $SITE_INFO_PHONE->value }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="SITE_INFO_SUPPORT_MAIL" class="text-capitalize">Company suupport mail <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="SITE_INFO_SUPPORT_MAIL" id="SITE_INFO_SUPPORT_MAIL" placeholder="Company Support Email" value="{{ $SITE_INFO_SUPPORT_MAIL->value }}" required>
                                        </li>
                                        <li class="col-12 col-md-6">
                                            <label for="copy_right_text" class="text-capitalize">Copyright Text <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="text" name="copy_right_text" id="copy_right_text" placeholder="Company Support Email" value="{{ setting('copy_right_text') ?? '© Lems Copyright' }}" required>
                                        </li>
                                        <li class="col-12 col-md-12">
                                            <label for="footer_description" class="text-capitalize">Footer Descripttion <span class="text-red">(*)</span></label>
                                            <textarea name="footer_description" id="footer_description" rows="4"
                                                class="form-control" required>{{setting('footer_description') ?? 'Footer Description, Example: This is Website Develop By YoungStars IT'}}</textarea>
                                        </li>
                                    </ul>

                                    <hr>
                                    <ul class="form-row">
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="email" class="text-capitalize">E-mail <span class="text-red">(*)</span></label>
                                            <input class="form-control" type="email" name="email" id="email" placeholder="info@elitedesign.com.bd" value="{{ setting('email') ?? 'hello@asifulmamun.info.bd' }}" required>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="whatsapp" class="text-capitalize">WhatsApp</label>
                                            <input class="form-control" type="number" name="whatsapp" id="whatsapp" placeholder="8801*********" value="{{ setting('whatsapp') ?? '01**********' }}">
                                            <small class="text-red">With Country Code (Without + sign)</small>
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="facebook" class="text-capitalize">Facebook</label>
                                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ setting('facebook') ?? '' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="messanger" class="text-capitalize">Messanger</label>
                                            <input class="form-control" type="text" name="messanger" id="messanger" value="{{ setting('messanger') ?? '' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="linkedin" class="text-capitalize">Linkedin</label>
                                            <input class="form-control" type="text" name="linkedin" id="linkedin" value="{{ setting('linkedin') ?? '' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="twitter" class="text-capitalize">Twitter</label>
                                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ setting('twitter') ?? '' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="youtube" class="text-capitalize">Youtube</label>
                                            <input class="form-control" type="text" name="youtube" id="youtube" value="{{ setting('youtube') ?? '' }}">
                                        </li>
                                        <li class="col-12 col-md-6 form-group">
                                            <label for="instagram" class="text-capitalize">Instagram</label>
                                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ setting('instagram') ?? '' }}">
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