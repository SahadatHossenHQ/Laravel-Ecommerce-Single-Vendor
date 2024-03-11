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
                                <input type="hidden" name="type" value="2">
                                <div class="form-group col-md-12">
                                    <label for="header_code" class="text-capitalize">Custom header code</label>
                                    <textarea name="header_code" id="header_code" rows="4"
                                        class="form-control ">{{ $header_code->value }} </textarea>
                                </div>
                                <hr>
                                <div class="form-group col-md-12">
                                    <label for="fb_pixel" class="text-capitalize">Facebook Pixel Code</label>
                                    <textarea name="fb_pixel" id="fb_pixel" rows="4"
                                        class="form-control ">{{$fb_pixel->value}}</textarea>
                                </div>
                                <hr>
                                <div class="form-group col-md-12">
                                    <label for="body_code" class="text-capitalize">Body Code</label>
                                    <textarea name="body_code" id="body_code" rows="4"
                                        class="form-control ">{{ setting('body_code') ?? "" }}</textarea>
                                </div>

                                <div class="border border-info py-2 mt-2">
                                    <div class="form-group col-md-12">
                                        <label for="BELOW_SLIDER_HTML_CODE_STATUS" class="text-capitalize">Below Slider Custom HTML Code Status</label>
                                        <select name="BELOW_SLIDER_HTML_CODE_STATUS" id="BELOW_SLIDER_HTML_CODE_STATUS">
                                            @if ( setting('BELOW_SLIDER_HTML_CODE_STATUS') == 1)
                                            <option value="1">ON</option>
                                            <option value="0">OFF</option>
                                            @else
                                            <option value="0">OFF</option>
                                            <option value="1">ON</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="BELOW_SLIDER_HTML_CODE" class="text-capitalize">Custom Html Code</label>
                                        <textarea name="BELOW_SLIDER_HTML_CODE" id="BELOW_SLIDER_HTML_CODE" rows="4"
                                            class="form-control ">{{ setting('BELOW_SLIDER_HTML_CODE') ?? '<b>Hello www.asifulmamun.info.bd</b>' }}</textarea>
                                    </div>
                                </div>
                                <div class="border border-info py-2 mt-2">
                                    <input type="hidden" name="type" value="11">
                                    <div class="form-group col-md-12">
                                        <label for="NOTICE_STATUS" class="text-capitalize">NOTICE STATUS</label>
                                        <select name="NOTICE_STATUS" id="NOTICE_STATUS">
                                            @if ( setting('NOTICE_STATUS') == 1)
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
                                        <small class="bg-warning p-1">It's under container of bootstrap</small>
                                        <textarea name="CUSTOM_NOTICE" id="CUSTOM_NOTICE" rows="4"
                                            class="form-control ">{{ setting('CUSTOM_NOTICE') ?? 'Today is offer for 30%' }}</textarea>
                                    </div>
                                </div>




                                <hr>
                                <div class="form-group col-md-12">
                                    <label for="FOOTER_COL_4_HTML" class="text-capitalize">Footer Column 4</label>
                                    <textarea name="FOOTER_COL_4_HTML" id="FOOTER_COL_4_HTML" rows="4"
                                        class="form-control ">{{ setting('FOOTER_COL_4_HTML') ?? '<b>Payment Support: Bkash, Roacket, Nagad</b>' }}</textarea>
                                </div>
                                <small class="p-4 bg-light text-primary">
                                    <a target="_blank" class="bg-warning p-2" href="https://getbootstrap.com/docs/4.5/components/alerts/">Help for HTML snippet from Bootstrap V5.4.3</a>
                                </small>
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
