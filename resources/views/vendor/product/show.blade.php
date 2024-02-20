@extends('layouts.vendor.app')

@section('title', 'Product Information')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Information</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{routeHelper('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Show Product</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">
                        Product Details
                    </h3>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{routeHelper('product/'.$product->id.'/edit')}}" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                    <a href="{{routeHelper('product')}}" class="btn btn-danger">
                        <i class="fas fa-long-arrow-alt-left"></i>
                        Back to List
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                    <div class="col-12">
                        <img src="{{asset('uploads/product/'.$product->image)}}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active">
                            <img src="{{asset('uploads/product/'.$product->image)}}" alt="Product Image">
                        </div>
                        @foreach ($product->images as $image)
                            <div class="product-image-thumb active">
                                <img src="{{asset('uploads/product/'.$image->name)}}" alt="Product Image">
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{$product->title}}</h3>
                    <p>{{$product->short_description}}</p>

                    <hr>
                     <h4>Available Colors</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach ($colors_product as $color)
                            <label class="btn btn-default text-center active">
                                {{$color->name}}
                                <br>
                                <i class="fas fa-circle fa-2x" style="color: {{$color->code}}"></i>
                                <br>
                                 Price:{{$color->price}}---Qnty:{{$color->qnty}}
                            </label>
                        @endforeach
                        
                    </div>
                     @foreach ($attributes as $attribute)
                    <h4 class="mt-3">Available {{$attribute->name}}</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                         <?php 
                            $attribute_prouct = DB::table('attribute_product')
                              ->select('*')
                              ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                              ->addselect('attribute_values.name as vName' )
                              ->addselect('attribute_product.id as vid' )
                              ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                              ->where('attribute_product.product_id', $product->id)
                                ->where('attributes.id', $attribute->id)
                              ->get();
                        ?>
                        @foreach($attribute_prouct  as $pro_color)
                        <label class="btn btn-default text-center active">
                            {{$pro_color->vName}}
                            <br>
                             Price:{{$pro_color->price}}---Qnty:{{$pro_color->qnty}}
                        </label>
                        @endforeach 
                    </div>
                    @endforeach
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h4 class="mb-0">
                          Regular Price: {{$product->regular_price}}
                        </h4>
                        <h4 class="mt-0">
                          <small>Discount Price: {{$product->discount_price}} </small>
                        </h4>
                        <h4 class="mt-0">
                            <small>
                                Shipping Charge:
                                @if ($product->shipping_charge)
                                    Dummy
                                @else
                                    Free
                                @endif
                            </small>
                        </h4>
                        <h4 class="mt-0"><small>Quantity: {{$product->quantity}}</small> </h4>
                        <h4 class="mt-0">
                            <small>Stock: 
                                @if ($product->quantity > 0)
                                    Available
                                @else
                                    Unavailable
                                @endif 
                            </small>
                        </h4>
                        @isset($product->brand->name)
                        <h4 class="mt-0"><small>Brand: {{$product->brand->name}}</small> </h4>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                        <a class="nav-item nav-link" id="product-categories-tab" data-toggle="tab" href="#product-categories" role="tab" aria-controls="product-categories" aria-selected="false">Categories</a>
                        <a class="nav-item nav-link" id="product-sub-categories-tab" data-toggle="tab" href="#product-sub-categories" role="tab" aria-controls="product-sub-categories" aria-selected="false">Sub Categories</a>
                        <a class="nav-item nav-link" id="product-tags-tab" data-toggle="tab" href="#product-tags" role="tab" aria-controls="product-tags" aria-selected="false">Tags</a>
                        @if ($product->downloads->count() > 0)
                        <a class="nav-item nav-link" id="product-downloads-tab" data-toggle="tab" href="#product-downloads" role="tab" aria-controls="product-downloads" aria-selected="false">Downloadable Files</a>
                        @endif
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                        {!! $product->full_description !!}
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"></div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"></div>
                    <div class="tab-pane fade" id="product-categories" role="tabpanel" aria-labelledby="product-categories-tab">
                        @forelse ($product->categories as $category)
                            
                            @if ($product->categories->last()->id == $category->id)
                                <strong>{{$category->name}}</strong>
                            @else
                                <strong>{{$category->name}},</strong>
                            @endif
                        @empty
                            <strong>Not Available</strong>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="product-sub-categories" role="tabpanel" aria-labelledby="product-sub-categories-tab">
                        @forelse ($product->sub_categories as $sub_category)
                            
                            @if ($product->sub_categories->last()->id == $sub_category->id)
                                <strong>{{$sub_category->name}}</strong>
                            @else
                                <strong>{{$sub_category->name}},</strong>
                            @endif
                        @empty
                            <strong>Not Available</strong>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="product-tags" role="tabpanel" aria-labelledby="product-tags-tab">
                        @forelse ($product->tags as $key => $tag)
                            
                            @if ($product->tags->last()->id == $tag->id)
                                <strong>{{$tag->name}}</strong>
                            @else
                                <strong>{{$tag->name}},</strong>
                            @endif
                            
                        @empty
                            <strong>Not Available</strong>
                        @endforelse
                    </div>
                    <div class="tab-pane fade" id="product-downloads" role="tabpanel" aria-labelledby="product-downloads-tab">
                        @foreach ($product->downloads as $key => $download)
                            <div class="mb-3">
                                <p><strong>File Name: </strong><a href="">{{$download->name}}</a></p>
                                @if ($download->url != NULL)
                                    <p><strong>File URL: </strong><a href="">{{$download->url}}</a></p>
                                @else
                                    <p><strong>File URL: </strong><a href="">{{asset('uploads/product/download/'.$download->url)}}</a></p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

</section>
<!-- /.content -->

@endsection