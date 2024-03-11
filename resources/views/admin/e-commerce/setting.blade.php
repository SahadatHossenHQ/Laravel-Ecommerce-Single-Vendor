@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" />
<style>
    .dropify-wrapper .dropify-message p {
        font-size: initial;
    }
</style>
@endpush

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Setting</h1>
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
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-header bg-success">
                            <h3 class="card-title">Application Images</h3>
                        </div>
                        <form action="{{routeHelper('setting/logo')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo"
                                    class="form-control @error('logo') is-invalid @enderror"
                                    data-default-file="{{'/uploads/setting/'.setting('logo')}}">
                                @error('logo')
                                <div class="invalid-feedback text-danger d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="card-body" id="meta_img_wrap">
                                <label for="auth_logo">Meta Imgaes 1200*627px</label>
                                <input type="file" name="auth_logo" id="auth_logo"
                                    class="form-control @error('auth_logo') is-invalid @enderror"
                                    data-default-file="{{'/uploads/setting/'.setting('auth_logo')}}">
                                @error('auth_logo')
                                <div class="invalid-feedback text-danger d-block">{{ $message }}</div>
                                @enderror
                                <a href="{{ route('admin.setting.seo') }}">Meta Data <i class="fas fa-caret-right"></i></a>
                            </div>
                            <div class="card-body">
                                <label for="favicon">Favicon</label>
                                <input type="file" name="favicon" id="favicon"
                                    class="form-control @error('favicon') is-invalid @enderror"
                                    data-default-file="{{'/uploads/setting/'.setting('favicon')}}">
                                @error('favicon')
                                <div class="invalid-feedback text-danger d-block">{{ $message }}</div>
                                @enderror
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

                <div class="col-12 col-md-8">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header">Update Notice</div>
                        <div class="card-body">
                            <h5 class="card-title">We are allways for there for support.</h5>
                            <p class="card-text">We are coming with new innovation @Finvasoft</p>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="col-sm-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting</h3>
                        </div>
                        <form action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="type" value="1">
                            <div class="card-body">
                                <div class="form-row">
                                    @foreach ($settings as $key => $setting)
                                    @php
                                    $name = str_replace('_', ' ', $setting->name);
                                    @endphp
                                    @if ($setting->name == 'footer_description')
                                    <div class="form-group col-md-12 {{$setting->name}}">
                                        <label for="{{$setting->name}}" class="text-capitalize">{{$name}}</label>
                                        <textarea name="{{$setting->name}}" id="{{$setting->name}}" rows="4"
                                            class="form-control @error($setting->name) is-invalid @enderror">{{$setting->value}}</textarea>
                                        @error($setting->name)
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    @elseif ($setting->name == 'fb_pixel')
                                    <div class="form-group col-md-12 {{$setting->name}}">
                                        <label for="{{$setting->name}}" class="text-capitalize">{{$name}}</label>
                                        <textarea name="{{$setting->name}}" id="{{$setting->name}}" rows="4"
                                            class="form-control @error($setting->name) is-invalid @enderror">{{$setting->value}}</textarea>
                                        @error($setting->name)
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    @elseif ($setting->name == 'is_point')
                                    <div class="form-group col-md-12 {{$setting->name}}">
                                        <label for="{{$setting->name}}" class="text-capitalize">{{$name}}</label>
                                        <select name="{{$setting->name}}" id="{{$setting->name}}">
                                            <option @if($setting->value=='1')selected @endif value="1">Active</option>
                                            <option @if($setting->value=='0')selected @endif value="0">Deactive</option>
                                        </select>
                                        @error($setting->name)
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    @elseif ($setting->name == 'mega_cat')
                                    @elseif ($setting->name == 'sub_cat')
                                    @elseif ($setting->name == 'mini_cat')
                                    @elseif ($setting->name == 'extra_cat')
                                    @elseif ($setting->name == 'g_bkash')
                                    @elseif ($setting->name == 'g_nagad')
                                    @elseif ($setting->name == 'g_rocket')
                                    @elseif ($setting->name == 'g_bank')
                                    @elseif ($setting->name == 'g_wallate')
                                    @elseif ($setting->name == 'g_cod')
                                    @elseif ($setting->name == 'g_aamar')
                                    @elseif ($setting->name == 'g_uddok')
                                    @elseif ($setting->name == 'meta_img')
                                    @elseif ($setting->name == 'uapi')
                                    @elseif ($setting->name == 'astore')
                                    @elseif ($setting->name == 'akey')
                                    @elseif ($setting->name == 'amode')
                                    @elseif ($setting->name == 'umode')
                                    @elseif ($setting->name == 'ubase')

                                    @else

                                    <div class="form-group col-md-6 {{$setting->name}}">
                                        <label for="{{$setting->name}}" class="text-capitalize">{{$name}}</label>
                                        <input type="text" name="{{$setting->name}}" value="{{$setting->value}}"
                                            class="form-control @error($setting->name) is-invalid @enderror">
                                        @error($setting->name)
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    @endif

                                    @endforeach
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
                </div> --}}
            </div>
        </div>
    </div>



</section>
<!-- /.content -->

@endsection

@push('js')
<script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('input[type="file"]').dropify();
        $('.col-md-6.logo').remove();
        $('.col-md-6.auth_logo').remove();
        $('.col-md-6.favicon').remove();
    });
</script>
@endpush