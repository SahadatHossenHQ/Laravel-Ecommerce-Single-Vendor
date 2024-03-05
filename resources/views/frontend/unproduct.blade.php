@extends('layouts.frontend.app')

@push('meta')

<meta name='keywords' content="@foreach($products as $product){{$product->title.', '}}@endforeach" />
@endpush

@section('title', 'All')

@section('content')

<!--================product  Area start=================-->
<br>
<div class="products" style="text-align: center;">
    <div class="containe" >
        <div class="row" id="grid-view">
           @foreach ($products as $product)
                <div class="product col-lg-2 col-md-3 col-sm-4 col-4">
                    <div class="product-wrapper"  style="height:240px">
                        <div class="pin">
                            <div class="thumbnail">
                            <a href="{{route('clasified.show',['slug'=>$product->slug])}}">
                                <img src="{{asset('uploads/product/'.$product->thumbnail)}}" alt="Product Image">
                                </a>
                            </div>
                            <div class="details">
                                <a href="{{route('clasified.show',['slug'=>$product->slug])}}">
                                    <h5>{{$product->title}}</h5>
                                </a>
                                <h6><strong style="color: var(--primary_color)">{{ setting('CURRENCY_CODE_MIN') ?? 'TK' }}.{{$product->price}}</strong></h6>
                            </div>
                       </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="row">
                    <div class="load ajax-loading col-lg-2 col-md-3 col-sm-6 col-6" style="display: none;">
                        <div class="covera skeletona">
                            <img id="cover" src="" />
                        </div>
                        <div class="contenta">
                            <h2 id="title" class="skeletona"></h2>
                            <small id="subtitle" class="skeletona"></small>
                            <small id="subtitle" class="skeletona2 skeletona"></small>
                            <div style="text-align: center;">
                            <p id="about" class="skeletona"></p>
                            <p id="about" class="skeletona"></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<!--================product  Area End=================-->

@endsection
@push('js')
<script>
   var site_url = "{{ url('/') }}";   
   var page = 1;
   
   load_more(page);


    function load_more(page){
        var _totalCurrentResult=$(".product").length;
        $.ajax({
            url: site_url + "/classic?page=" + page,
            type: "get",
            datatype: "html",
            data:{
                        skip:_totalCurrentResult
                },
            beforeSend: function()
            {
                $('.ajax-loading').show();
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('.ajax-loading').hide();
                $("#grid-view").append(result[0]);
                if(result[0].length==0){
                }else{
                   
                    setTimeout(function() {
                        page++;
                        load_more(page);
                    }, 3000);
                }
            },
            
        })
        
       
    }
</script>
@endpush