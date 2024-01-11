@extends('layouts.frontend.app')

@push('meta')
<meta name='description' content="Cart Products"/>
<meta name='keywords' content="@foreach(\App\Models\Tag::all() as $tag){{$tag->name.', '}}@endforeach" />
@endpush

@section('title', 'Cart Products')

@push('css')
    <style>
        .disable {
            color: currentColor;
            cursor: not-allowed;
            opacity: 0.5;
        }
    </style>
@endpush

@section('content')
<style>

.product-image {
  float: left;
  width: 150px;
}

.product-details {
  float: left;
  width: 25%;
}

.product-price {
  float: left;
  width: 12%;
}

.product-quantity {
  float: left;
  width: 20%;
}

.product-removal {
  float: left;
  width: 60px;
}

.product-line-price {
  float: left;
  width: 12%;
  text-align: right;
}
.shopping-cart{
    margin-top:20px;
}
/* This is used as the traditional .clearfix class */
.group:before, .shopping-cart:before,
.column-labels:before,
.product:before,
.totals-item:before,
.group:after,
.shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  content: "";
  display: table;
}

.group:after, .shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  clear: both;
}

.group, .shopping-cart,
.column-labels,
.product,
.totals-item {
  zoom: 1;
}




label {
  color: #aaa;
}


/* Column headers */
.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
}


/* Product entries */
.product {
  border-bottom: 1px solid #eee;
}
.product .product-image {
  text-align: center;
}
.product .product-image img {
  width: 100px;
}
.product .product-details .product-title {
  margin-right: 20px;
}
.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}
.product .product-quantity input {
  width: 40px;
}
.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-size: 12px;
  border-radius: 3px;
  text-align: center;
  width: 50px;
}
.product .remove-product:hover {
  background-color: #a44;
}

/* Totals section */
.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}
.totals .totals-item label {
  float: left;
  clear: both;
  width: 79%;
  text-align: right;
}
.totals .totals-item .totals-value {
  float: right;
  width: 21%;
  text-align: right;
}


.checkout {
  float: right;
  border: 0;
  margin-top: 20px;
  padding: 6px 25px;
  background-color: #6b6;
  color: #fff;
  font-size: 25px;
  border-radius: 3px;
}

.checkout:hover {
  background-color: #494;
}
.product-all .product{
    background: white;
    padding: 5px !important;
}
/* Make adjustments for tablet */
@media screen and (max-width: 767px) {
  
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }

  .column-labels {
    display: none;
  }

  .product-image {
    width: auto;
  }
 
  .m-price{
      display: block !important;
  }
  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }

  .product-price {
    clear: both;
    line-height: 20px;
    width: 100px;
  }

  .product-quantity {
    width: 140px;
  }
 

  .product-removal {
    width: auto;
    line-height: 32px;
  }

  .product-line-price {
    width: 70px;
    line-height: 20px;
    margin-left: 10px;
  }
  .btn-primary{
      width: 100%;
  }
}
/* Make more adjustments for phone */
@media screen and (max-width: 450px) {
  .product-removal {
    float: right;
  }

  .product-line-price {
   float: left;
clear: left;
width: auto;
margin-top: 10px;
text-align: left;
margin-left: 0;
  }

  

  .totals .totals-item label {
    width: 60%;
  }
  .totals .totals-item .totals-value {
    width: 40%;
  }
}


</style>


<div class="checkout-right">
    <div class="container">
    <div class="shopping-cart">
  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>


  <div class="product-all">
    
   
  
  
   
  </div>

</div>
        @if (Cart::count() > 0)
        <div class="text-right mt-2">
            <a href="{{route('checkout')}}" class="btn btn-primary">
                <i class="icofont icofont-shopping-cart"></i>
                Checkout Now
            </a>
        </div>
        @else
        <div class="text-right mt-2">
            <a href="javascript:void(0)" class="btn btn-primary disabled">
                <i class="icofont icofont-shopping-cart"></i>
                Checkout Now
            </a>
        </div>
        @endif
        
    </div>
</div>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            
            $(document).on('click', '.value-plus', function(e) {
                let id  = $(this).data('id');
                let btn = $(this);
                var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.val(), 10) + 1;
                $.ajax({
                    type: 'GET',
                    url: '/update/cart/'+id+'/'+newVal,
                    dataType: "JSON",
                    beforeSend: function() {
                        $(btn).addClass('disable');
                    },
                    success: function (response) {
                        getCart();
                    },
                    complete: function() {
                        $(btn).removeClass('disable');
                    }
                });
            });

            $(document).on('click', '#remove-product', function(e) {
                e.preventDefault();
                
                let id  = $(this).data('id');
                let btn = $(this);

                $.ajax({
                    type: 'GET',
                    url: '/destroy/cart/'+id,
                    dataType: "JSON",
                    beforeSend: function() {
                        $(btn).addClass('disable');
                    },
                    success: function (response) {
                        getCart();
                    },
                    complete: function() {
                        $(btn).removeClass('disable');
                    }
                });
            });

            
            $(document).on('click', '.value-minus', function(e) {
                var divUpd = $(this).parent().find('.value'),
                newVal = parseInt(divUpd.val(), 10) - 1;

                if (newVal >= 1) {
                    let id  = $(this).data('id');
                    let btn = $(this);
                    newVal = parseInt(divUpd.val(), 10) - 1;
                    $.ajax({
                        type: 'GET',
                        url: '/update/cart/'+id+'/'+newVal,
                        dataType: "JSON",
                        beforeSend: function() {
                            $(btn).addClass('disable');
                        },
                        success: function (response) {
                            getCart();
                        },
                        complete: function() {
                            $(btn).removeClass('disable');
                        }
                    });
                }
                
            });
       
  

            function getCart() {
                $.ajax({
                    type: "GET",
                    url: "{!! route('get.cart') !!}",
                    dataType: "JSON",
                    success: function (response) {
                        var total_qty    = 0;
                        var total = 0;
                        let html = '';
                        
                        if (response.count > 0) {
                            let sl = 1;
                            
                            var ven=[];
                            $.each(response.carts, function (key, val) {
                                total_qty += parseInt(val.qty);
                                total     += parseInt(val.subtotal);
                                if(ven.includes(val.weight)==false){
                                      html += '<span style="display: block;background: white;padding: 5px;border-bottom: 1px solid gainsboro;text-transform: capitalize;">Seller:'+val.options.seller+'</span>';
                                }
                                ven.push(val.weight);
                                
                                html += '<div class="product">';

                                html += '<div class="product-image">';
                                html += '<a href="/product/'+val.options.slug+'">';
                                html += '<img src="/uploads/product/'+val.options.image+'" alt="Product Image" class="img-responsive">';
                                html += '</a>';
                                html += '</div>';
                                html += '<div class="product-details">';
                                html += '<div class="product-title">'+val.name+'</div>';
                                // html += '<p class="product-description">'+val.options.color+', '+val.options.size+'</p>';
                                html += '</div>';
                                html += '<div class="product-price"><span class="m-price" style="display:none">Price</span> '+number_format(val.price, 2, '.', ',')+'.TK</div>';
                                html += '<div class="quantity product-quantity">';
                                html += '<div class="quantity-select">';
                                html += '<div class="entry value-minus" data-id="'+key+'">&nbsp;</div>';
                                html += '<input type="text" class="entry value" value="'+val.qty+'" readonly>';
                                html += '<div class="entry value-plus active" data-id="'+key+'">&nbsp;</div>';
                                html += '</div>';
                                html += '</div>';
                                html += '<div class="product-removal">';
                                html += '<a href="" id="remove-product" data-id="'+key+'">';
                                html += '<div class="close2 remove-product">remove</div>';
                                html += '</a>';
                                html += '</div>';
                                html += '<div class="product-line-price"> <span class="m-price" style="display:none">Sub Total</span> '+number_format(val.subtotal, 2, '.', ',')+'.TK</div>';
                                html += '</div>';
         
                               
                            });
                        } else {
                            html += '<tr class="rem2">';
                            html += '<td colspan="8" class="text-danger">Your cart is empty</td>';
                            html += '</td>';
                        }
                        

                        $('.product-all').html(html);
                        
                        $('span.qty').text(total_qty);
                        $('th.total-cart-amount').text(number_format(total, 2, '.', ','));
                        $('span#total-cart-amount').text(number_format(total, 2, '.', ','));
                        $('span#count_product').text(response.count+' Products');
                    }
                });
            }
            getCart();

            function number_format(number, decimals, dec_point, thousands_sep) {
                var n = !isFinite(+number) ? 0 : +number, 
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                toFixedFix = function (n, prec) {
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    var k = Math.pow(10, prec);
                    return Math.round(n * k) / k;
                },
                s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
            number_format();
        });
    </script>
@endpush