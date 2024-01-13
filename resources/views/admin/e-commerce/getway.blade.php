@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')


@push('css')
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
       
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            display:none !important
        }
        .title{
            font-size: 25px;background: var(--secondary_color);color: white;border-radius: 5px;padding: 10px;text-align: center;
        }
        .getway label{
            font-size: 20px;
            display: flex;
        }
        .getway label input{
            margin-right: 5px;
        }
   </style>
@endpush
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 offse">
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
              
                <div class="col-sm-12">
                    <!-- Default box -->
                    <div class="casrd card-success">
                        
                        <form action="{{route('admin.setting_g')}}" method="POST">
                            @csrf
                            <div class="card-body row getway">
                                <h1 class="col-md-12 title">Manual/Offline Pay</h1>
                                <div class="form-group col-md-4">
                                    <label><input type="checkbox" name="bkash" @if(setting('g_bkash')=='true') checked @endif> Bkash</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><input type="checkbox" name="nagad" @if(setting('g_nagad')=='true') checked @endif> Nagad</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><input type="checkbox" name="rocket" @if(setting('g_rocket')=='true') checked @endif> Rocket</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><input type="checkbox" name="bank" @if(setting('g_bank')=='true') checked @endif> Bank</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><input type="checkbox" name="wallate" @if(setting('g_wallate')=='true') checked @endif> Wallate</label>

                                </div>
                                 <div class="form-group col-md-4">
                                    <label><input type="checkbox" name="cod" @if(setting('g_cod')=='true') checked @endif> COD</label>
                                </div>
                                <div class="col-sm-6" style="background:#45b03c80">
                                     <h1 class="col-md-12 title">Online Pay- aamarPay</h1>
                                     <div class="form-group">
                                         <label>StoreID</label>
                                         <input type="" class="form-control" name="astore" value="{{setting('astore')}}">
                                     </div>
                                      <div class="form-group">
                                         <label>Signature key</label>
                                         <input type="" class="form-control" name="akey" value="{{setting('akey')}}">
                                     </div>
                                     <div class="form-group">
                                         <label> Mode</label>
                                         <select name="amode" class="form-control">
                                             <option  @if(setting('amode')=='1') selected @endif value="1">Sandbox</option>
                                             <option  @if(setting('amode')=='2') selected @endif value="2">Live</option>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                        <label><input type="checkbox" name="aamar" @if(setting('g_aamar')=='true') checked @endif> is active</label>
                                    </div>
                                </div>
                                 <div class="col-sm-6" style="background:#80b8ea6e">
                                     <h1 class="col-md-12 title" style="background:#2f84d0">Online Pay- UddoktaPay</h1>
                                     <div class="form-group">
                                         <label>API Key</label>
                                         <input type="" class="form-control" name="uapi" value="{{setting('uapi')}}">
                                     </div>
                                       <div class="form-group">
                                         <label>Base Url</label>
                                         <input type="" class="form-control" name="ubase" value="{{setting('ubase')}}">
                                     </div>
                                      <div class="form-group">
                                         <label> Mode</label>
                                         <select name="umode" class="form-control">
                                             <option  @if(setting('umode')=='1') selected @endif value="1">Sandbox</option>
                                             <option  @if(setting('umode')=='2') selected @endif value="2">Live</option>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                        <label><input type="checkbox" name="uddok" @if(setting('g_uddok')=='true') checked @endif> is active</label>
                                    </div>
                                </div>


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
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script>
        $(function () {
            $('#cover_photo').dropify();
            $('.select2').select2();
        });
       
    </script>

@endpush