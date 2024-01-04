<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
class ProductsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $i=0;
       foreach($rows as $data){
            $i++;
            if($i==1){

            }else{
                $product=Product::Create([
                    'user_id'           =>$data['0'],
                    'brand_id'          =>$data['1'],
                    'slug'              =>$data['2'],
                    'title'             =>$data['3'],
                    'short_description' =>$data['4'],
                    'full_description'  =>$data['5'],
                     'regular_price'    =>$data['6'],
                     'whole_price'      =>$data['7'],
                    'buying_price'      =>$data['8'],
                    'dis_type'          =>$data['9'],
                    'discount_price'    =>$data['10'],
                    'quantity'          =>$data['11'],
                    'image'             =>$data['12'] ??Null,
                    'point'             =>$data['13'],
                    'reach'             =>$data['14'],
                    'status'            =>$data['15'],
                    'type'              =>$data['16'],
                    'shipping_charge'=>'1',
                ]);

                if(!empty($data[17])){
                   $galleries=json_decode($data['17']);
                    foreach($galleries as $gallery){
                        $product->images()->create([
                            'name'       => $gallery,
                        ]);
                    }
                }
                if(!empty($data[18])){
                   $categories=json_decode($data['18']);
                        $product->categories()->sync( $categories, []);
                }
                if(!empty($data[19])){
                   $scategories=json_decode($data['19']);
                   $product->sub_categories()->sync($scategories, []);
                }
                if(!empty($data[20])){
                   $mcategories=json_decode($data['20']);
                   $product->mini_categories()->sync($mcategories, []);
                }
              
                if(!empty($data[21])){
                   $ecategories=json_decode($data['21']);
                   $product->extra_categories()->sync($ecategories, []);
                }
                if(!empty($data[22])){
                    $colors=json_decode($data['22']);
                    foreach($colors as $color){
                        DB::table('attribute_product')->insert([
                            'attribute_value_id'=>$color->vid,
                            'product_id'=>$product->id,
                            'qnty'=>$color->qnty,
                            'price'=>$color->price,
                        ]);
                    }
                }
                if(!empty($data[23])){
                    $attributes=json_decode($data['23']);
                    foreach($attributes as $attribute){
                        DB::table('attribute_product')->insert([
                            'attribute_value_id'=>$attribute->vid,
                            'product_id'=>$product->id,
                            'qnty'=>$attribute->qnty,
                            'price'=>$attribute->price,
                        ]);
                    }
                }
            }
       }
    }
}
