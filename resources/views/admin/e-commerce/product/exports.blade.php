<table>
	<thead>
		<tr>
			<td>vendor</td>
			<td>brand</td>
			<td>slug</td>
			<td>title</td>
			<td>short</td>
			<td>descripton</td>
			<td>regular</td>
			<td>whole</td>
			<td>buying</td>
			<td>dis_type</td>
			<td>dis_price</td>
			<td>qnty</td>
			<td>thumbnail</td>
			<td>poit</td>
			<td>status</td>
			<td>reach</td>
			<td>type</td>
			<td>gallery</td>
			<td>categories</td>
			<td>sub_cat</td>
			<td>mini_cat</td>
			<td>extra_cat</td>
			<td>colors</td>
			<td>atrributes</td>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{$product->user_id}}</td>
			<td>{{$product->brand_id}}</td>
			<td>{{$product->slug}}</td>
			<td>{{$product->title}}</td>
			<td>{{$product->short_description}}</td>
			<td>{{$product->full_description}}</td>
			<td>{{$product->regular_price}}</td>
			<td>{{$product->whole_price}}</td>
			<td>{{$product->buying_price}}</td>
			<td>{{$product->dis_type}}</td>
			<td>{{$product->discount_price}}</td>
			<td>{{$product->quantity}}</td>
			<td>{{$product->image}}</td>
			<td>{{$product->point}}</td>
			<td>{{$product->reach}}</td>
			<td>{{$product->status}}</td>
			<td>{{$product->type}}</td>
			<td>
				@php
				
				$images=DB::table('product_images')->where('product_id',$product->id)->get();
				$i=[];
				foreach($images as $img){
					$i[]= $img->name;
				}
				echo json_encode($i);
				@endphp
			</td>
			<td>
				@php
				
				$cats=DB::table('category_product')->where('product_id',$product->id)->get();
				$cid=[];
				foreach($cats as $cat){
					$cid[]= $cat->category_id;
				}
				echo json_encode($cid);
				@endphp
			</td>
			<td>
				@php
				
				$scats=DB::table('product_sub_category')->where('product_id',$product->id)->get();
				$scid=[];
				foreach($scats as $scat){
					$scid[]= $scat->sub_category_id;
				}
				echo json_encode($scid);
				@endphp
			</td>
			<td>
				@php
				
				$mcats=DB::table('mini_category_product')->where('product_id',$product->id)->get();
				$mcid=[];
				foreach($mcats as $mcat){
					$mcid[]= $mcat->mini_category_id;
				}
				echo json_encode($mcid);
				@endphp
			</td>
			<td>
				@php
				
				$ecats=DB::table('extra_mini_category_product')->where('product_id',$product->id)->get();
				$ecid=[];
				foreach($ecats as $ecat){
					$ecid[]= $ecat->extra_mini_category_id;
				}
				echo json_encode($ecid);
				@endphp
			</td>
			
			
		
			<td>
				@php
				
				$colors=DB::table('color_product')->where('product_id',$product->id)->get();
				$cl=[];
				foreach($colors as $color){
					$cl[]= ['vid'=>$color->color_id,'price'=>$color->price,'qnty'=>$color->qnty];
				}
				echo json_encode($cl);
				@endphp
			</td>
			<td>
				@php
				
				$atri=DB::table('attribute_product')->where('product_id',$product->id)->get();
				$at=[];
				foreach($atri as $attr){
					$at[]= ['vid'=>$attr->attribute_value_id,'price'=>$attr->price,'qnty'=>$attr->qnty];
				}
				echo json_encode($at);
				@endphp
			</td>
		</tr>
		@endforeach
	</tbody>
</table>