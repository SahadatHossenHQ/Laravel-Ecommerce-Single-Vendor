
                                  
                                    

                                    <div class="form-group col-md-12" style="margin-bottom: 5px;border:1px solid gainsboro;">
                                        <label style="display: block;" for="color"> <button style="width: 100%;text-align:left;" type="button" data-toggle="collapse" data-target="#collapseExample{{$i}}" aria-expanded="false" aria-controls="collapseExample{{$i}}">Select {{$attribute->name}}:<i style="float: right;top: 8px;position: relative;" class="fas fa-arrow-down"></i> </button></label>
                                        <div class="collapse" id="collapseExample{{$i}}">
                                          <div style="display: flex;" class="input-group ">
                                                <select id="select_attribute_{{$attribute->slug}}"  data-placeholder="Select Color" class="form-control  @error('colors') is-invalid @enderror" >
                                                    <option value="">Select More</option>
                                                    @foreach ($attribute->values as $attribute_value)
                                                        <option value="<?php echo $attribute_value->slug.','.$attribute_value->id ;?>" >{{$attribute_value->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('colors')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                          </div>
                                          
                                          <div id="increment_attribute_{{$attribute->slug}}">
                                               @isset($product)
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
                                                    <div class="input-group mt-2"> 
                                                        <input class="form-control" type="hidden" readonly=""  name="attributes[]" value="{{$pro_color->attribute_value_id}}">
                                                         <input class="form-control" type="text" readonly="" value="{{$pro_color->vName}}"> 
                                                         <input class="form-control" type="number" placeholder="extra price" name="attribute_prices[]" value="{{$pro_color->price}}"> 
                                                         <input class="form-control" type="number" placeholder="extra quantity" name="attributes_quantits[]" value="{{$pro_color->qnty}}">
                                                           <div class="input-group-append" id="remove" style="cursor:context-menu">
                                                            <a href="{{route('admin.attr.delete.n2',['cc'=>$pro_color->vid])}}">
                                                                <span class="input-group-text">Remove</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach 
                                                @endisset
                                          </div>
                                          </div>
                                    </div>
                                    <script>
                                         // increment
                                        $(document).on('change', '#select_attribute_{{$attribute->slug}}', function (e) { 
                                            let vals = $(this).val();
                                            var val = vals.split(',');
                                            let htmlData = '<div class="input-group mt-2">';
                                            htmlData += ' <input class="form-control" type="hidden" name="attributes[]"    readonly value="'+val[1]+'">';
                                            htmlData += ' <input class="form-control" type="text"   readonly value="'+val[0]+'">';
                                            htmlData += ' <input class="form-control" type="number" placeholder="extra price" name="attribute_prices[]" value="">';
                                            htmlData += ' <input class="form-control" type="number" placeholder="extra quantity" name="attributes_quantits[]" value="">';

                                            htmlData += '<div class="input-group-append" id="remove" style="cursor:context-menu">';
                                            htmlData += '<span class="input-group-text">Remove</span>';
                                            htmlData += '</div>';
                                            htmlData += '</div>';
                                            $('#increment_attribute_{{$attribute->slug}}').append(htmlData);
                                        });
                                    </script>