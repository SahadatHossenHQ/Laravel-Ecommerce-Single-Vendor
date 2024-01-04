@isset($product)
<?php 
  $attributes = DB::table('attributes')->get();
?>
  @foreach ($attributes as $attribute)
                    <?php 
                            $attribute_prouct = DB::table('attribute_product')
                              ->select('*')
                              ->join('attribute_values', 'attribute_values.id', '=', 'attribute_product.attribute_value_id')
                              ->addselect('attribute_values.name as vName' )
                              ->addselect('attribute_values.id as vid' )
                              ->join('attributes', 'attributes.id', '=', 'attribute_values.attributes_id')
                              ->where('attribute_product.product_id', $product->id)
                                ->where('attributes.id', $attribute->id)
                              ->get();
                    ?>
                    @if($attribute_prouct->count() > 0)
                        @push('js')
                        <script>
                            $(document).on('click', 'input[type="radio"][name="{{$attribute->slug}}"]', function(e) {
                                $('input#{{$attribute->slug}}').val(this.value);
                            })
                        </script>
                        @endpush
                    @endif
                @endforeach
                  @push('js')
<script>
            $(document).on('click', '#productInfo', function (e) {

                let url = $(this).data('url');
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    success: function (response) {
                        var result = response;
                       
                        if(result[0].discount_price >0){
                             $('#nhide').show();
                             $('#nprice').text('Discount Price :');
                            $('span#item_price').text(' '+result[0].regular_price);
                            $('span#del_price').text(' '+result[0].discount_price);
                        }else{
                            $('#nhide').hide();
                            $('#nprice').text('Regular Price :');
                             $('span#del_price').text(' '+result[0].regular_price);
                        }
                        

                        let colors = '';
                        let sizes = '';
                        $.each(result[0].colors, function (key, color) {
                            colors += '<label class="btn rounded-circle p-3 m-1 color" style="background: '+color.code+'">';
                            colors += '<input type="radio" name="color" autocomplete="off" value="'+color.slug+'">';
                            colors += '</label>';
                        });

                        sizes += '<div class="col-12 pl-0">';
                        sizes += '<p><strong>Select Size:</strong></p>';
                        sizes += '</div>';
                        $.each(result[0].sizes, function (key, size) {
                            sizes += '<div class="form-check col-2 col-sm-1">';
                            sizes += '<input class="form-check-input" type="radio" name="size" value="'+size.name+'">';
                            sizes += '<label class="form-check-label" for="flexRadioDefault2">'+size.name+'</label>';
                            sizes += '</div>';
                        });
                        let image = '<img src="/uploads/product/'+result[0].image+'" class="img-responsive img-fluid"/>'

                        $('#cart-img').html(image);
                        $('#colors').html(colors);
                        $('#attributes_all').html(result[1]);
                        $('#attr_values').html(result[2]);
                        $('input#id').val(result[0].id);
                    },
                    complete: function() {
                        $('#cart-modal').modal('show');
                    },
                    error: function(xhr) {
                        $.toast({
                            heading: xhr.status,
                            text: xhr.responseJSON.message,
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                        });
                    }
                });
            });
            $(document).on('click', '#productInfo1', function (e) {

                let url = $(this).data('url');
                $.ajax({
                    type: 'GET',
                    url: url,
                    dataType: 'JSON',
                    success: function (response) {
                        var result = response;
                        $('span#item_price').text(' '+result[0].regular_price);
                        $('span#del_price').text(' '+result[3].price);

                        let colors = '';
                        let sizes = '';
                        $.each(result[0].colors, function (key, color) {
                            colors += '<label class="btn rounded-circle p-3 m-1 color" style="background: '+color.code+'">';
                            colors += '<input type="radio" name="color" autocomplete="off" value="'+color.slug+'">';
                            colors += '</label>';
                        });

                        sizes += '<div class="col-12 pl-0">';
                        sizes += '<p><strong>Select Size:</strong></p>';
                        sizes += '</div>';
                        $.each(result[0].sizes, function (key, size) {
                            sizes += '<div class="form-check col-2 col-sm-1">';
                            sizes += '<input class="form-check-input" type="radio" name="size" value="'+size.name+'">';
                            sizes += '<label class="form-check-label" for="flexRadioDefault2">'+size.name+'</label>';
                            sizes += '</div>';
                        });
                        let image = '<img src="/uploads/product/'+result[0].image+'" class="img-responsive img-fluid"/>'
                        let camp=' <input type="hidden" name="camp" id="camp" value="'+result[3].id+'">'

                        $('#cart-img').html(image);
                        $('#colors').html(colors);
                        $('#attributes_all').html(result[1]);
                        $('#attr_values').html(result[2]);
                        $('#attr_values').append(camp);
                        $('input#id').val(result[0].id);
                    },
                    complete: function() {
                        $('#cart-modal').modal('show');
                    },
                    error: function(xhr) {
                        $.toast({
                            heading: xhr.status,
                            text: xhr.responseJSON.message,
                            icon: 'error',
                            position: 'top-right',
                            stack: false
                        });
                    }
                });
            });
       $(document).on('click', '.color', function(e) {
            $('.color').removeClass('active');
            $(this).addClass('active');
            let value = $(this).children('input[name="color"]').val();
            $('input#color').val(value);
            let product =$('input#id').val();
            let dynamic_price =$('input.dynamic_price').val();
             let formData = $('#addToCart').serialize();
            $.ajax({
                    type: 'POST',
                    url: '/get/color/price',
                    data:formData,
                    dataType: "JSON",
                    success: function (response) {
                       $('#del_price').html(response);
                       $('.dynamic_price').val(response);
                    }
                });
        });
         $(document).on('click', '.get_attri_price', function(e) {
        
            let formData = $('#addToCart').serialize();
            $.ajax({
                    type: 'POST',
                    url: '/get/attr/price',
                    data: formData,
                    dataType: "JSON",
                    success: function (response) {
                       $('#del_price').html(response);
                       $('.dynamic_price').val(response);
                    }
                });
        });
</script>

 @endpush
 @endisset