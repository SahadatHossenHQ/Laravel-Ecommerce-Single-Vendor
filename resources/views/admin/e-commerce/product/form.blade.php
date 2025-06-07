@extends('layouts.admin.e-commerce.app')

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/assets/plugins/dropzone/min/dropzone.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="/assets/plugins/file-uploader/image-uploader.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <style>
        .spec{
            padding: 30px;
            border-radius: 10px;
            background: #ffffff;
            box-shadow:  5px 5px 10px #d0d0d0,
                        -5px -5px 10px #f0f0f0;
        }
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
        .note-editor{
            box-shadow: none !important;
        }
    </style>
@endpush

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    @isset($product)
                        Edit Product 
                    @else 
                        Add New Product
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
    <div class="card" style="background:transparent;">
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
        <style>
            .nc{
                border: 1px solid gainsboro;margin-top: 10px;
            }
        </style>
        <div class="row">
            <form class="col-lg-8 col-sm-12 border" action="{{ isset($product) ? routeHelper('product/'.$product->id) : routeHelper('product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($product)
                    <input type="hidden" value="{{$product->id}}" id="id">
                    @method('PUT')
                @endisset
                <input type="hidden" value="{{$type??''}}" name="ptypen">

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="title">Product name <span class="text-danger">(*)</span>:</label>
                            <input type="text" name="title" id="title" placeholder="" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title ?? old('title') }}" >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="title">Product Code (SKU):</label>
                            <input type="text" name="sku" id="sku" placeholder="" class="form-control @error('title') is-invalid @enderror" value="{{ $product->sku ?? old('sku') }}" >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="short_description">Short Description:</label>
                        <textarea name="short_description" id="short_description" rows="3" placeholder="" class="form-control @error('short_description') is-invalid @enderror" >{{ $product->short_description ?? old('short_description') }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="full_description">Full Description <span class="text-danger">(*)</span>:</label>
                        <textarea  rows="50" name="full_description" id="full_description" class="form-control">{{$product->full_description??old('full_description')}}</textarea>
                        @error('full_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">                        
                        <div class="form-group col-md-6">
                            <label for="full_description">Select Vendor <span class="text-danger">(*):</label>
                            <select class="form-control" name="vendor">
                                <option value="">Select Vendor</option>
                                @foreach(App\Models\ShopInfo::get(['name','user_id']) as $vend)
                                <option @isset($product->user_id)@if($product->user_id==$vend->user_id)selected @endif
                                    @endisset value="{{$vend->user_id}}">{{$vend->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="quantity">Quantity <span class="text-danger">(*)</span>:</label>
                            <input type="number" name="quantity" id="quantity" placeholder="" class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity ?? old('quantity') }}" required>
                            @error('quantity')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="buying_price">Buying Price:</label>
                            <input step="0.01" type="number" name="buying_price" id="buying_price" placeholder="" class="form-control @error('buying_price') is-invalid @enderror" value="{{ $product->buying_price ?? old('buying_price') }}">
                            @error('buying_price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="regular_price">Whole Sell Price:</label>
                            <input step="0.01" type="number" name="whole_price" id="whole_price" placeholder="" class="form-control @error('whole_price') is-invalid @enderror" value="{{ $product->whole_price ?? old('whole_price') }}">
                            @error('whole_price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="regular_price">Regular Price <span class="text-danger">(*)</span>:</label>
                            <input step="0.01" type="number" name="regular_price" id="regular_price" placeholder="" class="form-control @error('regular_price') is-invalid @enderror" value="{{ $product->regular_price ?? old('regular_price') }}" required>
                            @error('regular_price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
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
                            @if($product->discount_price<1)
                            @php($discount_price='')
                            @else
                                @php($discount_price=$product->regular_price-$product->discount_price)
                                @endif
                            @endif
                        @endisset
                        <div class="form-group col-md-6">
                            <label for="discount_price">Discount:</label>
                            <input step="0.01" type="number" name="discount_price" id="discount_price" placeholder="" class="form-control @error('discount_price') is-invalid @enderror" value="{{ $discount_price ?? old('discount_price') }}" >
                            @error('discount_price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                       
                    
                        
                        <div class="form-group col-md-6">
                            <label for="brand">Select Brand <span class="text-danger">(*)</span>:</label>
                            <select name="brand" id="brand" data-placeholder="Select Brand" class="form-control select2 @error('brand') is-invalid @enderror">
                                <option value="">Select Brand</option>
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
                            <select name="sub_categories[]" id="sub_category" multiple data-placeholder="Select Sub Category" class="sub_category form-control select2 @error('sub_categories') is-invalid @enderror">
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
                            <label for="category">Select Campaing:</label>
                            <select name="campaigns[]" id="campaign" multiple data-placeholder="Select Campaing" class="category form-control select2 @error('campaigns') is-invalid @enderror" >
                                <option value="">Select Campaing</option>
                                @foreach ($campaigns as $campaign)
                                    <option value="{{$campaign->id}}" @isset($product) {{$campaign->id == $product->brand_id ? 'selected':''}} @endisset>{{$campaign->name}}</option>
                                @endforeach
                            </select>
                            @error('campaigns')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        
                        
                        <div class="form-group col-md-8">
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

                        <div class="form-group col-md-4">
                            <label for="quantity">Point:</label>
                            <input type="number" name="point" id="point" placeholder="" class="form-control @error('point') is-invalid @enderror" value="{{ $product->point ?? old('point') }}" >
                            @error('point')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <div style="background: transparent;padding: 10px;border-radius: 5px;border:1px solid gainsboro;">
                                <div class="row">
                                    <div class="form-group col-md-12" style="margin-bottom: 5px; padding:10px;">
                                    <label style="display: block;" for="color"> <button style="width: 100%;text-align:left;" type="button" data-toggle="collapse" data-target="#collapseExampleColor" aria-expanded="false" aria-controls="collapseExampleColor">Select Color:<i style="float: right;top: 8px;position: relative;" class="fas fa-arrow-down"></i> </button></label>
                                    <div class="collapse" id="collapseExampleColor">
                                        <div style="display: flex;" class="input-group ">
                                                
                                                <select id="select_color"  data-placeholder="Select Color" class="form-control  @error('colors') is-invalid @enderror" >
                                                    <option value="">Select Color</option>
                                                    @foreach ($colors as $color)
                                                        <option  style="color:white;background: {{$color->code}}" value="{{$color->slug.','.$color->id}}" >{{$color->name}}</option>
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
                                                    <input class="form-control" type="hidden" readonly="" name="colors[]" value="{{$pro_color->id}}">
                                                     <input class="form-control" type="text"  readonly="" value="{{$pro_color->name}}"> 
                                                     <input class="form-control" type="number" placeholder="extra price" name="color_prices[]" value="{{$pro_color->price}}"> 
                                                     <input class="form-control" type="number" placeholder="extra quantity" name="color_quantits[]" value="{{$pro_color->qnty}}">
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

                        <div class="form-group col-md-12">
                            <label for="prdct_extra_msg">Product Extra Message:</label>
                            <input type="text" name="prdct_extra_msg" id="prdct_extra_msg" placeholder="Ex: Fast Delivery Available in Dhaka" class="form-control @error('prdct_extra_msg') is-invalid @enderror" value="{{ $product->prdct_extra_msg ?? "" }}">
                            @error('prdct_extra_msg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <!-- <div class="form-group col-md-6">
                            <label for="size">Select Size:</label>
                            <select name="sizes[]" id="size" multiple data-placeholder="Select Size" class="form-control select2 @error('sizes') is-invalid @enderror" >
                                <option value="">Select Size</option>
                                @foreach ($sizes as $size)
                                    <option value="{{$size->id}}" @isset($product) @foreach($product->sizes as $pro_size) {{$size->id == $pro_size->id ? 'selected':''}} @endforeach @endisset>{{$size->name}}</option>
                                @endforeach
                            </select>
                            @error('sizes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->
                        <input type='hidden' name="shipping_charge" value="1">
                        <!-- <div class="form-group col-md-6">
                            <label for="tag">Shipping Charge:</label>
                            <select name="shipping_charge" id="shipping_charge" class="form-control @error('shipping_charge') is-invalid @enderror" required>
                                <option value="1">Paid</option>
                                <option value="0">Free</option>
                            </select>
                            @error('shipping_charge')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->

                        


                        <h4 class="col-12">
                            <button style="width: 100%; border-radius:5px; text-align:left; padding: 15px; border: .5px solid #d2d6dc;  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
" 
                            type="button" data-toggle="collapse" 
                            data-target="#BookOpen" 
                            aria-expanded="false" 
                            aria-controls="BookOpen">Specification for book:<i style="float: right;top: 8px;position: relative;" class="fas fa-arrow-down"></i> </button>
                        </h4>
                           
                        
                        <div class="form-row col-md-12 spec collapse mb-4" id="BookOpen">
                            
                           <div class="form-group col-md-6">
                                 <label for="full_description">Select Author:</label>
                                 <select class="form-control" name="author_id">
                                     <option value="">Select Vendor  </option>
                                     @foreach(App\Models\Author::get(['name','id']) as $author)
                                      <option @isset($product->author_id)@if($product->author_id==$author->id)selected @endif @endisset value="{{$author->id}}">{{$author->name}}</option>
                                      @endforeach
                                 </select>
                            </div>
                             <div class="form-group col-md-6">
                                 <label for="full_description">PDF file:</label>
                                 <input type="file" name="pdf">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">isbn:</label>
                                <input type="text" name="isbn" id="isbn" placeholder="Write product isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ $product->isbn ?? old('isbn') }}" >
                                @error('isbn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">edition:</label>
                                <input type="text" name="edition" id="edition" placeholder="Write product edition" class="form-control @error('edition') is-invalid @enderror" value="{{ $product->edition ?? old('edition') }}" >
                                @error('edition')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">pages:</label>
                                <input type="text" name="pages" id="pages" placeholder="Write product edition" class="form-control @error('pages') is-invalid @enderror" value="{{ $product->pages ?? old('pages') }}" >
                                @error('pages')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">country:</label>
                                <input type="text" name="country" id="country" placeholder="Write product country" class="form-control @error('country') is-invalid @enderror" value="{{ $product->country ?? old('country') }}" >
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">language:</label>
                                <input type="text" name="language" id="language" placeholder="Write product language" class="form-control @error('language') is-invalid @enderror" value="{{ $product->language ?? old('language') }}" >
                                @error('language')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12 mb-5">
                            @isset($product)
                                <div><a target="_blank" href="{{asset('uploads/product/video/'.$product->video)}}">Click View Video</a>
                                <br>
                                <a target="_blank" href="{{asset('uploads/product/video/'.$product->video_thumb)}}">Click View Video Thumbnail</a></div>
                            @endisset
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="video">Upload Video:</label>
                                <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" >
                                <br>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="video">OR Past Youtbe Video:</label>
                                <input {{ $product->yvideo ?? old('yvideo') }} type="text" name="yvideo" class="form-control @error('yvideo') is-invalid @enderror" >
                                <br>
                            </div>
                            
                            <div class="form-group col-md-4">
                                <label for="video_thumb">Upload Video Thumbnail:</label>
                                <input type="file" name="video_thumb" class="form-control @error('video_thumb') is-invalid @enderror" >
                                @error('video')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Product Thumbnail Image <span class="text-danger">(*)</span>: </label>
                            <input type="file" name="image" id="image" accept="image/*" class="form-control dropify @error('image') is-invalid @enderror" data-default-file="@isset($product) /uploads/product/{{$product->image}}@enderror">
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-8">
                            <label>Product Gallery Image <span class="text-danger">(*)</span>:</label>
                            <div class="input-group" id="increment" style=" border: .5px solid #d2d6dc; border-radius:5px;">
                                <input type="file" class="form-control" accept="image/*" id="images" name="images[]"  @isset($product) @else required @endisset  >
                                <select name="imagesc[]" id="imagesc">
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $color)
                                        <option  style="color:white;background: {{$color->code}}" value="{{$color->slug}}" >{{$color->name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append" id="add" style="cursor:context-menu">
                                    <span class="input-group-text">Add More</span>
                                </div>
                            </div>
                            {{-- <div class="input-images-1" style="padding-top: .5rem;"></div> --}}
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
                                    <div class="d" @foreach ($colors as $color) @if($color->slug==$image->color_attri) style="background: {{$color->code}}" @endif @endforeach>
                                        <img src="{{asset('uploads/product/'.$image->name)}}" style="width: 100px;height: 70px;object-fit: cover;">
                                        <div style="flex: 1;text-align: right;">
                                            <a  class="btn btn-danger" href="{{route('admin.idelte',$image->id)}}">Delete</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                            
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="status" @isset ($product) {{ $product->status ? 'checked':'' }} @else checked @endisset>
                                <label class="custom-control-label" for="status">Status</label>
                            </div>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="book" id="book" @isset ($product) {{ $product->book ? 'checked':'' }} @else  @endisset>
                                <label class="custom-control-label" for="book">book</label>
                            </div>
                            @error('book')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="sheba" id="sheba" @isset ($product) {{ $product->sheba ? 'checked':'' }} @else  @endisset>
                                <label class="custom-control-label" for="sheba">sheba</label>
                            </div>
                            @error('sheba')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="download_able" id="download_able" @isset($product){{ $product->download_able ? 'checked':''}} @endisset>
                                <label class="custom-control-label" for="download_able">Download able</label>
                            </div>
                            @error('download_able')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                    
                    
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="action" value="exit" class="btn btn-lg btn-primary d-block w-100">
                                @isset($product)
                                    <i class="fas fa-arrow-circle-up"></i>
                                    Update
                                @else
                                    <i class="fas fa-sign-out-alt"></i>
                                    Submit and Exit
                                @endisset
                            </button>
                        </div>
                        @if(!isset($product))
                        <div class="col-md-6">
                            <button type="submit" name="action" value="create_another" class="btn btn-lg btn-success d-block w-100">
                                <i class="fas fa-plus-circle"></i>
                                Submit and Create Another
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
            <div class="col-lg-4 col-sm-12">
                @include('components.product-sidebar')
            </div>
        </div>
    </div>
    <!-- /.card -->
    


    
    @if(isset($product->downloads) && $product->downloads->count() > 0)
    <div class="card" style="background:transparent;">
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

@endsection

@push('js')
    <!-- Select2 -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('/assets/plugins/dropify/dropify.min.js') }}"></script>
    <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/dist/extra.js"></script>
    
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

            $('#short_description').summernote();
            $('#spec').summernote();
            
            // increment
            $(document).on('click', '#add', function (e) { 
                
                let htmlData = '<div class="input-group mt-2">';
                htmlData += '<input type="file" class="form-control" accept="image/*" name="images[]" required>';
                htmlData += '<select name="imagesc[]">';
                htmlData += $('#imagesc').html();
                htmlData += '</select>';
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
                        url: '/admin/delete/product/download/'+id,
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
                    url: '/admin/get/sub-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#sub_category').empty();
                        $('#sub_category').append('<option value="">Select Sub Category</option>');
                        $.each(response, function (key, val) { 
                            $('#sub_category').append('<option value="'+val.id+'">'+val.name+'</option>');
                        });
                        $('#sub_category').trigger('change');
                    }
                });
            });

            $(document).on('change', '#sub_category', function() {
                var options = document.getElementById('sub_category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/get/mini-categories',
                    data: {
                        'ids': values,
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('#mini_category').empty();
                        $('#mini_category').append('<option value="">Select Mini Category</option>');
                        $.each(response, function (key, val) { 
                            $('#mini_category').append('<option value="'+val.id+'">'+val.name+'</option>');
                        });
                        $('#mini_category').trigger('change');
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
                    url: '/admin/get/product/image/'+id,
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
            productImages();
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
            });
        </script>
        @else
        <script>
                $(document).on('change', '#category', function() {
                
                var options = document.getElementById('category').selectedOptions;
                var values = Array.from(options).map(({ value }) => value);
                
                $.ajax({
                    type: 'POST',
                    url: '/admin/get/attributes',
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
        </script>
    @endisset
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('#ncolor').colorpicker();


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
@endpush
