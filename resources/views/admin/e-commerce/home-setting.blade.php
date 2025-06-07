@extends('layouts.admin.e-commerce.app')

@section('title', 'Settings')


@push('css')
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <style>
       
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            display:none !important
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
    <div class="card" style="background:transparent;">
        <div class="card-header">
            <h3 class="card-title">Application Settings</h3>
        </div>
        <div class="card-body">
            <div class="row">
              
                <div class="col-sm-8 offset-md-2">
                    <!-- Default box -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Setting</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{routeHelper('setting')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                            	<input type="hidden" name="type" value="3">
                              
                                <div class="form-group col-md-12">
                                    <label for="mega" class="text-capitalize">Mega Category</label>
                                   <select name="mega[]" id="mega" class="select2 form-control" multiple required>
                                   	<option value="">Hide</option>
                                    @foreach (\App\Models\Category::where('status',true)->get() as $category)
                                       
                                     <option  value="{{$category->id}}"  @if(!empty($mega_cat->value)) @foreach(json_decode($mega_cat->value) as $c) @if($category->id==$c)Selected @endif @endforeach @endif>{{$category->name}}</option>
                                    @endforeach

                                   
                                    </select>

                                </div>
                                <div class="form-group col-md-12">
                                    <label for="sub" class="text-capitalize">Sub Category</label>
                                   <select name="sub[]" id="sub" class="select2 form-control" multiple required>
                                   	<option value="">Hide</option>
                                     @foreach (\App\Models\SubCategory::where('status',true)->get() as $category)
                                    <option  value="{{$category->id}}"  @if(!empty($sub_cat->value)) @foreach(json_decode($sub_cat->value) as $c) @if($category->id==$c)Selected @endif @endforeach @endif>{{$category->name}}</option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-12">
                                    <label for="mini" class="text-capitalize">Mini Category</label>
                                   <select name="mini[]" id="mini" class="select2 form-control" multiple required>
                                   	<option value="">Hide</option>
                                     @foreach (\App\Models\miniCategory::where('status',true)->get() as $category)
                                    <option   value="{{$category->id}}" @if(!empty($mini_cat->value)) @foreach(json_decode($mini_cat->value) as $c) @if($category->id==$c)Selected @endif @endforeach @endif>{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                 <div class="form-group col-md-12">
                                    <label for="extra" class="text-capitalize">Extra Mini Category</label>
                                   <select name="extra[]" class="select2 form-control" id="extra" multiple required>
                                   	<option value="">Hide</option>
                                     @foreach (\App\Models\ExtraMiniCategory::where('status',true)->get() as $category)
                                    <option  value="{{$category->id}}" @if(!empty($extra_cat->value)) @foreach(json_decode($extra_cat->value) as $c) @if($category->id==$c)Selected @endif @endforeach @endif>{{$category->name}}</option>
                                    @endforeach
                                    </select>
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