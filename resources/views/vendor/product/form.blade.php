@extends('layouts.vendor.app')

@section('title')
    @isset($product)
        Edit Product 
    @else 
        Add Product
    @endisset
@endsection

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/plugins/dropzone/min/dropzone.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="/assets/plugins/file-uploader/image-uploader.min.css">
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }
        .custom-file::-webkit-file-upload-button {
            visibility: hidden;
        }
        .custom-file::before {
            content: 'Choose File';
            display: inline-block;
            background: linear-gradient(top, #f9f9f9, #e3e3e3);
            border: 1px solid #ced4da;
            border-radius: 3px;
            padding: 8px 8px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            text-shadow: 1px 1px #fff;
            font-weight: 700;
            font-size: 10pt;
            width: 100%;
            text-align: center;
        }
   </style>
@endpush

@section('content')

@if(auth()->user()->is_approved == 0)
<p style=" font-size: 24px;padding: 20px;text-align: center;margin: auto;color: red;font-family: auto;">Your Account is Under Review.You Cant Upload Product At This Time</p>
@else
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($product)
                        Edit Product 
                    @else 
                        Add Product
                    @endisset
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        @isset($product)
                            Edit Product 
                        @else 
                            Add Product
                        @endisset
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <!-- Default box -->
    @if($errors->any())
    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif
    <div class="card">
        <div class="card-header">
            
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        @isset($product)
                            Edit Product
                        @else 
                            Add New Product
                        @endisset
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    @isset($product)
                    <a href="{{routeHelper('product/'. $product->id)}}" class="btn btn-info">
                        <i class="fas fa-eye"></i>
                        Show
                    </a>
                    @endisset
                    <a href="{{routeHelper('product')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ isset($product) ? routeHelper('product/'.$product->id) : routeHelper('product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @isset($product)
                @method('PUT')
            @endisset
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title <span class="text-danger">(*)</span>:</label>
                    <input type="text" name="title" id="title" placeholder="Write product title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title ?? old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Product Code (SKU):</label>
                    <input type="text" name="sku" id="sku" placeholder="Product Code/SKU" class="form-control @error('title') is-invalid @enderror" value="{{ $product->sku ?? old('sku') }}" >
                    {{-- @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description <span class="text-danger">(*)</span>:</label>
                    <textarea name="short_description" id="short_description" rows="3" placeholder="Write product short description" class="form-control @error('short_description') is-invalid @enderror" required>{{ $product->short_description ?? old('short_description') }}</textarea>
                    @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="full_description">Full Description <span class="text-danger">(*)</span>:</label>
                    <textarea name="full_description" id="full_description" class="form-control">{{$product->full_description??old('full_description')}}</textarea>
                    @error('full_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="buying_price">Buying Price:</label>
                        <input type="number" name="buying_price" id="buying_price" placeholder="Enter product buying price" class="form-control @error('buying_price') is-invalid @enderror" value="{{ $product->buying_price ?? old('buying_price') }}">
                        @error('buying_price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="regular_price">Regular Price <span class="text-danger">(*)</span>:</label>
                        <input type="number" name="regular_price" id="regular_price" placeholder="Enter product regular price" class="form-control @error('regular_price') is-invalid @enderror" value="{{ $product->regular_price ?? old('regular_price') }}" required>
                        @error('regular_price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="regular_price">Whole Sell Price:</label>
                        <input type="number" name="whole_price" id="whole_price" placeholder="Enter product whole sell price" class="form-control @error('whole_price') is-invalid @enderror" value="{{ $product->whole_price ?? old('whole_price') }}">
                        @error('whole_price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prdct_extra_msg">Product Extra Message:</label>
                        <input type="text" name="prdct_extra_msg" id="prdct_extra_msg" placeholder="Express Delivery in Dhaka" class="form-control @error('prdct_extra_msg') is-invalid @enderror" value="{{ $product->prdct_extra_msg ?? "" }}">
                        @error('prdct_extra_msg')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dis_type">Discount Type:</label>
                        <select name="dis_type" id="dis_type" class="form-control @error('dis_type') is-invalid @enderror">
                            <option value="0" @isset($product) {{$product->dis_type == '0' ? 'selected':''}} @endisset>None</option>
                            <option value="1" @isset($product) {{$product->dis_type == '1' ? 'selected':''}} @endisset>Flat</option>
                            <option value="2" @isset($product) {{$product->dis_type == '2' ? 'selected':''}} @endisset>Parcent %</option>
                        </select>
                        @error('dis_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @isset($product) 
                        @if($product->dis_type == '2')
                            @php($discount_price=(($product->regular_price - $product->discount_price) / ($product->regular_price ))*100)
                        @else
                            @php($discount_price=$product->regular_price-$product->discount_price)
                        @endif
                    @endisset
                    <div class="form-group col-md-6">
                        <label for="discount_price">Discount:</label>
                        <input type="number" name="discount_price" id="discount_price" placeholder="Enter product discount price" class="form-control @error('discount_price') is-invalid @enderror" value="{{ $discount_price ?? old('discount_price') }}" >
                        @error('discount_price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="quantity">Quantity <span class="text-danger">(*)</span>:</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Enter product quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity ?? old('quantity') }}" required>
                        @error('quantity')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="brand">Select Brand:</label>
                        <select name="brand" id="brand" data-placeholder="Select Brand" class="form-control select2 @error('brand') is-invalid @enderror">
                            <option value="0">Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" @isset($product) {{$brand->id == $product->brand_id ? 'selected':''}} @endisset>{{$brand->name}}</option>
                            @endforeach
                        </select>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="category">Select Category <span class="text-danger">(*)</span>:</label>
                        <select name="categories[]" id="category" multiple data-placeholder="Select Category" class="category form-control select2 @error('categories') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @isset($product) @foreach($product->categories as $pro_category) {{$category->id == $pro_category->id ? 'selected':''}} @endforeach @endisset>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="sub_category">Select Sub Category:</label>
                        <select name="sub_categories[]" id="sub_category" data-placeholder="Select Sub Category" class="sub_category form-control {{isset($product) ? 'select2':''}} @error('sub_categories') is-invalid @enderror"  {{isset($product) ? 'multiple':''}}>
                            @isset($product)
                                @foreach ($product->sub_categories as $sub_category)
                                    <option value="{{$sub_category->id}}" selected>{{$sub_category->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('sub_categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mini_category">Select Mini Category:</label>
                        <select name="mini_categories[]" id="mini_category" data-placeholder="Select Mini Category" class="mini_category form-control {{isset($product) ? 'select2':''}} @error('mini_categories') is-invalid @enderror"  {{isset($product) ? 'multiple':''}}>
                            @isset($product)
                                @foreach ($product->mini_categories as $mini_category)
                                    <option value="{{$mini_category->id}}" selected>{{$mini_category->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('mini_categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="extra_categories">Select Extra Category:</label>
                        <select name="extra_categories[]" id="extra_category" data-placeholder="Select Mini Category" class="extra_categories form-control {{isset($product) ? 'select2':''}} @error('mini_categories') is-invalid @enderror"  {{isset($product) ? 'multiple':''}}>
                            @isset($product)
                                @foreach ($product->extra_categories as $extra_category)
                                    <option value="{{$extra_category->id}}" selected>{{$extra_category->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('extra_categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                                <label for="tag">Select Tag:</label>
                                <select name="tags[]" id="tag" multiple data-placeholder="Select Tag" class="form-control select2 @error('tags') is-invalid @enderror" >
                                    <option value="">Select Tag</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}" @isset($product) @foreach($product->tags as $pro_tag) {{$tag->id == $pro_tag->id ? 'selected':''}} @endforeach @endisset>{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        <input type='hidden' name="shipping_charge" value="1">
                        <div class="form-group col-md-12">
                            <div style="background: #eeeeee;padding: 10px;border-radius: 5px;">
                                <div class="row">
                                    <div class="form-group col-md-12" style="margin-bottom: 5px;border:1px solid gainsboro;">
                                        <label style="display: block;" for="color"> <button style="width: 100%;text-align:left;" type="button"
                                                data-toggle="collapse" data-target="#collapseExampleColor" aria-expanded="false"
                                                aria-controls="collapseExampleColor">Select Color:<i
                                                    style="float: right;top: 8px;position: relative;" class="fas fa-arrow-down"></i>
                                            </button></label>
                                        <div class="collapse" id="collapseExampleColor">
                                            <div style="display: flex;" class="input-group ">
                                                <select id="select_color" data-placeholder="Select Color"
                                                    class="form-control  @error('colors') is-invalid @enderror">
                                                    <option value="">Select Color</option>
                                                    @foreach ($colors as $color)
                                                    <option style="color:white;background: {{$color->code}}"
                                                        value="{{$color->slug.','.$color->id}}">{{$color->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('colors')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div id="increment_color">
                                                @isset($product)
                                                @foreach($colors_product as $pro_color)
                                                <div class="input-group mt-2">
                                                    <input class="form-control" type="hidden" readonly="" name="colors[]"
                                                        value="{{$pro_color->id}}">
                                                    <input class="form-control" type="text" readonly="" value="{{$pro_color->name}}">
                                                    <input class="form-control" type="number" placeholder="extra price" name="color_prices[]"
                                                        value="{{$pro_color->price}}">
                                                    <input class="form-control" type="number" placeholder="extra quantity"
                                                        name="color_quantits[]" value="{{$pro_color->qnty}}">
                                                    <div class="input-group-append" id="remove" style="cursor:context-menu">
                                                        <a href="{{route('admin.color.delete.n2',['cc'=>$pro_color->id,'pp'=>$product->id])}}">
                                                            <span class="input-group-text">Remove</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="sho_attributes" class="row">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">Product Image <span class="text-danger">(*)</span>: <a target="_blank" href="https://youtu.be/JsZc-I_Wygk">How to Optimize Image</a></label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control dropify @error('image') is-invalid @enderror" data-default-file="@isset($product) /uploads/product/{{$product->image}}@enderror">
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        @isset($product)                     
                            <div class="form-group col-md-6">
                                <label>Product Gallery Image <span class="text-danger">(*)</span>: <a target="_blank" href="https://youtu.be/JsZc-I_Wygk">How to Optimize Image</a></label>
                                <div class="input-group" id="increment">
                                    <input type="file" class="form-control" accept="image/*" id="images" name="images[]"
                                        @isset($product) @else required @endisset>
                                    <select name="imagesc[]" id="imagesc">
                                        <option value="">Select Color</option>
                                        @foreach($colors as $color)
                                            <option style="color:white;background: {{ $color->code }}"
                                                value="{{ $color->slug }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append" id="add" style="cursor:context-menu">
                                        <span class="input-group-text">Add More</span>
                                    </div>
                                </div>
                                @error('images')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <style type="text/css">
                                    .d {
                                        display: flex;
                                        align-items: center;
                                        padding: 10px;
                                        margin: 10px 0px;
                                        border-radius: 5px;
                                    }
                                </style>
                                @isset($product)
                                    @foreach($product->images as $image)
                                        <div class="d" @foreach ($colors as $color) @if($color->slug==$image->color_attri)
                                            style="background: {{ $color->code }}" @endif @endforeach>
                                            <img src="{{ asset('uploads/product/'.$image->name) }}"
                                                style="width: 100px;height: 70px;object-fit: cover;">
                                            <div style="flex: 1;text-align: right;">
                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.idelte',$image->id) }}">Delete</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                        @else
                            <div class="form-group col-md-6">
                                <label>Product Gallery Image <span class="text-danger">(*)</span>: <a target="_blank" href="https://youtu.be/JsZc-I_Wygk">How to Optimize Image</a></label>
                                <div class="input-group" id="increment">
                                    <input type="file" class="form-control" accept="image/*" id="images" name="images[]" required>
                                        
                                    <div class="input-group-append" id="add" style="cursor:context-menu">
                                        <span class="input-group-text">Add More</span>
                                    </div>
                                </div>
                                @error('images')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endisset
                    </div>
                    

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="download_able" id="download_able" @isset($product){{ $product->download_able ? 'checked':''}} @endisset>
                        <label class="custom-control-label" for="download_able">Download able</label>
                    </div>
                    @error('download_able')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @isset($product)
                    @if ($product->downloads->count() < 1)
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Product Downloadable file</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-horizontal">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Downloadable Files</label>
                                                <div class="col-sm-10">
                                                    <div class="card border">
                                                        <div class="card-header">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Name:</strong>
                                                                </div>
                                                                <div class="col-md-4"><strong>File URL:</strong></div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body px-1 py-2">
                                                            <div class="row">
                                                                <div class="col-12" id="increment-file">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <span id="add-file" class="btn btn-success">Add File</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="download_limit" class="col-sm-2 col-form-label">Download Limit</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="download_limit" name="download_limit" value="{{$product->download_limit ?? old('download_limit')}}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>Leave blank for unlimited re-downloads</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="download_expire" class="col-sm-2 col-form-label">Download Expire</label>
                                                <div class="col-sm-4">
                                                    <input type="date" class="form-control" id="download_expire" name="download_expire" value="{{$product->download_expire ?? old('download_expire')}}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <span>Enter the number of days before a downlink link expires, or leave blank</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                                </div>
                            </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    @endif
                @else
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Product Downloadable file</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-horizontal">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Downloadable Files</label>
                                            <div class="col-sm-10">
                                                <div class="card border">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <strong>Name:</strong>
                                                            </div>
                                                            <div class="col-md-4"><strong>File URL:</strong></div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body px-1 py-2">
                                                        <div class="row">
                                                            <div class="col-12" id="increment-file">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span id="add-file" class="btn btn-success">Add File</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="download_limit" class="col-sm-2 col-form-label">Download Limit</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="download_limit" name="download_limit" value="{{$product->download_limit ?? old('download_limit')}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <span>Leave blank for unlimited re-downloads</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="download_expire" class="col-sm-2 col-form-label">Download Expire</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" id="download_expire" name="download_expire" value="{{$product->download_expire ?? old('download_expire')}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <span>Enter the number of days before a downlink link expires, or leave blank</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                            </div>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                @endisset
                
                
            <div class="card-footer">
                <button type="submit" class="mt-1 btn btn-primary">
                    @isset($product)
                        <i class="fas fa-arrow-circle-up"></i>
                        Update
                    @else
                        <i class="fas fa-plus-circle"></i>
                        Submit
                    @endisset
                </button>
                
            </div>
        </form>
    </div>
    <!-- /.card -->
    
    {{-- @isset($product)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Product Gallery Images</h3>
        </div>
        <div class="card-body">
            <form action="{{routeHelper('update/product/image')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label>Product Gallery Image <span class="text-danger">(*)</span>:</label>
                    <div class="input-group" id="increment">
                        <input type="file" class="form-control" accept="image/*" id="images" name="images[]"
                            @isset($product) @else required @endisset>
                        <select name="imagesc[]" id="imagesc">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
                                <option style="color:white;background: {{ $color->code }}"
                                    value="{{ $color->slug }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append" id="add" style="cursor:context-menu">
                            <span class="input-group-text">Add More</span>
                        </div>
                    </div>
                    @error('images')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <style type="text/css">
                        .d {
                            display: flex;
                            align-items: center;
                            padding: 10px;
                            margin: 10px 0px;
                            border-radius: 5px;
                        }
                    </style>
                    @isset($product)
                        @foreach($product->images as $image)
                            <div class="d" @foreach ($colors as $color) @if($color->slug==$image->color_attri)
                                style="background: {{ $color->code }}" @endif @endforeach>
                                <img src="{{ asset('uploads/product/'.$image->name) }}"
                                    style="width: 100px;height: 70px;object-fit: cover;">
                                <div style="flex: 1;text-align: right;">
                                    <a class="btn btn-danger"
                                        href="{{ route('admin.idelte',$image->id) }}">Delete</a>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>

                <button type="submit" class="btn btn-primary mt-2">
                    <i class="fas fa-arrow-circle-up"></i>    
                    Update
                </button>
            </form>
        </div>
    </div> 
    @endisset --}}

    @if(isset($product->downloads) && $product->downloads->count() > 0)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Product Download File</h3>
        </div>
        <form action="{{routeHelper('update/product/download')}}"  class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Downloadable Files</label>
                    <div class="col-sm-10">
                        <div class="card border">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <strong>Name:</strong>
                                    </div>
                                    <div class="col-md-4"><strong>File URL:</strong></div>
                                </div>
                            </div>
                            <div class="card-body px-1 py-2">
                                <div class="row">
                                    <div class="col-12" id="increment-file">
                                        @isset($product->downloads)
                                            @foreach ($product->downloads as $download)
                                                <div class="row mt-2">
                                                    <div class="col-md-4">
                                                        <input type="text" name="file_name[]" class="form-control" placeholder="Enter file name" value="{{$download->name}}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="file_url[]" class="form-control" placeholder="Enter file url" value="{{$download->url}}">
                                                        
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="file" name="files[]" class="custom-file">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="hidden" name="ids[]" value="{{$download->id}}">
                                                        <a href="#" id="remove-file" data-id="{{$download->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span id="add-file" class="btn btn-success">Add File</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="download_limit" class="col-sm-2 col-form-label">Download Limit</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="download_limit" name="download_limit" value="{{$product->download_limit ?? old('download_limit')}}">
                    </div>
                    <div class="col-sm-6">
                        <span>Leave blank for unlimited re-downloads</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="download_expire" class="col-sm-2 col-form-label">Download Expire</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="download_expire" name="download_expire" value="{{$product->download_expire ?? old('download_expire')}}">
                    </div>
                    <div class="col-sm-6">
                        <span>Enter the number of days before a downlink link expires, or leave blank</span>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div> 
    @endif
    

</section>
<!-- /.content -->
@endif
@endsection

@push('js')
    <!-- Select2 -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    
    <script type="text/javascript" src="/assets/plugins/file-uploader/image-uploader.min.js"></script>
    @isset($product)
        @if ($product->downloads->count() < 1)
        <script>
            $(document).on('click', '#download_able', function(e) {
                
                if (this.checked) {
                    $('#modal-default').modal('show')
                }
                else {
                    $('#modal-default').modal('hide')
                }
            })
        </script>
        @endif
    @else
    <script>
        $(document).on('click', '#download_able', function(e) {
            
            if (this.checked) {
                $('#modal-default').modal('show')
            }
            else {
                $('#modal-default').modal('hide')
            }
        })
    </script>
    @endisset
    
    <script>
        $(document).ready(function () {
            $('.select2').select2();
            $('.dropify').dropify();
            $('#full_description').summernote();
            // $('.input-images-1').imageUploader();

            
            
            // increment
            $(document).on('click', '#add', function (e) { 
                let htmlData = '<div class="input-group mt-2">';
                htmlData += '<input type="file" class="form-control" accept="image/*" name="images[]" required>';

                htmlData += '<div class="input-group-append" id="remove" style="cursor:context-menu">';
                htmlData += '<span class="input-group-text">Remove</span>';
                htmlData += '</div>';
                htmlData += '</div>';
                $('#increment').append(htmlData);
            });
 // increment
            $(document).on('change', '#select_color', function (e) { 
               let colors = $(this).val();
                var color = colors.split(',');

                let htmlData = '<div class="input-group mt-2">';
                htmlData += ' <input class="form-control" type="hidden" name="colors[]"  readonly value="'+color[1]+'">';
                htmlData += ' <input class="form-control" type="text"    readonly value="'+color[0]+'">';
                htmlData += ' <input class="form-control" type="number" placeholder="extra price" name="color_prices[]" value="">';
                htmlData += ' <input class="form-control" type="number" placeholder="extra quantity" name="color_quantits[]" value="">';

                htmlData += '<div class="input-group-append" id="remove" style="cursor:context-menu">';
                htmlData += '<span class="input-group-text">Remove</span>';
                htmlData += '</div>';
                htmlData += '</div>';
                $('#increment_color').append(htmlData);
            });
            // remove
            $(document).on('click', '#remove', function(e) {
                $(this).parent().remove();
            });

            // increment file
            $(document).on('click', '#add-file', function (e) {
                let htmlData = '<div class="row mt-2">';
                htmlData += '<div class="col-md-4"><input type="text" name="file_name[]" id="" class="form-control" placeholder="Enter file name"></div>';
                htmlData += '<div class="col-md-4"><input type="text" name="file_url[]" id="" class="form-control" placeholder="Enter file url"></div>';
                htmlData += '<div class="col-md-2"><input type="file" name="files[]" id="" class="custom-file"></div>';
                htmlData += '<div class="col-md-2">';
                htmlData += '<input type="hidden" name="ids[]" value="0">';
                htmlData += '<button type="button" data-id="0" id="remove-file" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button></div>';
                htmlData += '</div>';

                $('#increment-file').append(htmlData);
            });

            // remove file
            $(document).on('click', '#remove-file', function(e) {
                e.preventDefault();
                let btn = $(this);
                let id = $(this).data('id');

                if (id == 0) {
                    $(this).parent().parent().remove();
                } 
                else {
                    $.ajax({
                        type: 'GET',
                        url: '/vendor/delete/product/download/'+id,
                        dataType: "JSON",
                        beforeSend: function() {
                            $(btn).addClass('disabled');
                        },
                        success: function (response) {
                            $(btn).parent().parent().remove();
                        },
                        complete: function() {
                            $(btn).removeClass('disabled');
                        }
                    });
                }
                
            });

            $(document).on('change', '#category', function() {
                
                var options = document.getElementById('category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/vendor/get/sub-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        let data = '<option value="">Select Sub Category</option>';
                        $.each(response, function (key, val) { 
                            data += '<option value="'+val.id+'">'+val.name+'</option>';
                            
                        });
                        $('#sub_category').html(data).attr('multiple', true).select2();
                    }
                });
            });
             $(document).on('change', '#sub_category', function() {
                
                var options = document.getElementById('sub_category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/vendor/get/mini-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        let data = '<option value="">Select Sub Category</option>';
                        $.each(response, function (key, val) { 
                            data += '<option value="'+val.id+'">'+val.name+'</option>';
                            
                        });
                        $('#mini_category').html(data).attr('multiple', true).select2();
                    }
                });
            });
               $(document).on('change', '#mini_category', function() {
                
                var options = document.getElementById('mini_category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/vendor/get/extra-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        
                        let data = '<option value="">Select Sub Category</option>';
                        $.each(response, function (key, val) { 
                            data += '<option value="'+val.id+'">'+val.name+'</option>';
                            
                        });
                        $('#extra_category').html(data).attr('multiple', true).select2();
                    }
                });
            });
        });
    </script>
    @isset($product)
        <script>
            function productImages() {
                
                let id = '{!! $product->id !!}';
                console.log(id);
                $.ajax({
                    type: 'GET',
                    url: '/vendor/get/product/image/'+id,
                    dataType: 'JSON',
                    success: function (response) {
                        
                        let preloaded = [];
                        $.each(response, function (key, val) { 
                            preloaded.push({
                                id: val.id,
                                src: '/uploads/product/'+val.name
                            });
                        });

                        $('.input-images-1').imageUploader({
                            preloaded: preloaded,
                            imagesInputName: 'photos',
                            preloadedInputName: 'old'
                        });
                    }
                });
            }
             function attributes(){
                var options = document.getElementById('category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                var product_id = $('#id').val();
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/get/attributes',
                    data: {
                        'ids': values,
                        'product_id': product_id,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sho_attributes').html(response);
                    }
                });
            }
            attributes();
            $(document).on('change', '#category', function() {
                
                var options = document.getElementById('category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                 var product_id = $('#id').val();
                $.ajax({
                    type: 'POST',
                    url: '/vendor/get/attributes',
                    data: {
                        'ids': values,
                        'product_id': product_id,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sho_attributes').html(response);
                    }
                });
            });
        </script>
        @else
        <script>
                $(document).on('change', '#category', function() {
                
                var options = document.getElementById('category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/vendor/get/attributes',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sho_attributes').html(response);
                    }
                });
            });



            // Dicount required while change discount type
            $(document).on('change', '#dis_type', function(e) {
                // Check if the selected value is not equal to 0
                if ($(this).val() != "0") {
                    // Make discount_price input required
                    $('#discount_price').prop('required', true);
                } else {
                    // Make discount_price input not required
                    $('#discount_price').prop('required', false);
                }
            });
        </script>
    @endisset
@endpush