<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Category;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use view;
class attributeController extends Controller
{   
    public function index(){
        $attributes = Attribute::get();
         return view('admin.e-commerce.attribute.index',compact('attributes'));
    }
    public function form(){
    $categories=Category::all();
       return view('admin.e-commerce.attribute.form',compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'        => 'required|max:255',
        ]);
        $rand=rand(999,9999);
        Attribute::create([
            'category_id'        => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name).'-'.$rand,
        ]);

        notify()->success("Attribute successfully added", "Added");
        return redirect()->back();
    }
    public function delete($id){
        Attribute::find($id)->delete();
        notify()->success("Attribute successfully deleted", "Added");
        return redirect()->back();
    }
     public function edit($id){
         $categories=Category::all();
        $attribute=Attribute::find($id);
       return view('admin.e-commerce.attribute.form',compact('attribute','categories'));
    }
    public function update($id,Request $request){
       
        $this->validate($request, [
            'name'        => 'required|max:255',
        ]);
         $rand=rand(999,9999);
        $attribute=Attribute::find($id);
        $attribute->update([
            'category_id'        => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name).'-'.$rand,
        ]);

        notify()->success("Attribute successfully Updated", "Added");
        return redirect()->back();
    }
    public function value($id){
        $values=AttributeValue::where('attributes_id',$id)->get();
          $attribute=Attribute::find($id);
       return view('admin.e-commerce.attribute.value',compact('values','attribute'));

    }
    public function storeValue(Request $request){
        $this->validate($request, [
            'name'        => 'required|max:255',
        ]);
        $rand=rand(999,9999);
        $has=AttributeValue::where('slug',Str::slug($request->name))->first();
    
            AttributeValue::create([
                'attributes_id'        => $request->att,
                'name'        => $request->name,
                'slug'        => Str::slug($request->name).'-'.$rand,
            ]);

             notify()->success("Value successfully added", "Added");
        
        return redirect()->back();
    }
    public function deleteValue ($id){
        AttributeValue::find($id)->delete();
        notify()->success("Value successfully deleted", "Added");
        return redirect()->back();
    }
    public function editValue($id){
        $value=AttributeValue::find($id);
       return view('admin.e-commerce.attribute.value-update',compact('value'));
    }
     public function updateValue(Request $request){
        $this->validate($request, [
            'name'        => 'required|max:255|unique:sizes,name',
        ]);
        $attribute=AttributeValue::find($request->att);
        $attribute->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
        ]);

        notify()->success("Value successfully Updated", "Added");
        return redirect()->to('admin/attribute/value/'.$attribute->attributes_id);
    }
    public function getAttribute(Request $request){
        $attributes = Attribute::whereIn('category_id', $request->ids)->get();
        $i=0;
        if(isset($request->product_id)){
            $product=product::find($request->product_id);
            if($attributes->count() > 0){
                $data='';
                foreach ($attributes as $attribute){
                    $i++;
                    $data .= View::make("components.attribute")
                    ->with("attribute", $attribute)
                    ->with("product", $product)
                    ->with("i", $i)
                    ->render();
                }
                return json_encode(array($data));
            }
        }else{
            if($attributes->count() > 0){
                $data='';
                foreach ($attributes as $attribute){
                     $i++;
                    $data .= View::make("components.attribute")
                    ->with("attribute", $attribute)
                    ->with("i", $i)
                    ->render();
                }
                return json_encode(array($data));
            }
        }
    }
}
