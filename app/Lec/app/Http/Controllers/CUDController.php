<?php

namespace App\Http\Controllers;

use App\product;
use App\location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CUDController extends Controller
{
    //product type
    public function CreateType(){
        return view('locationForm.CreateType');
    }

    public function CreateStoreType(request $request){
        
                //
                $validated = $request->validate([
                    'name' => 'string|min:4|required|unique:locations',
                    'image' => 'mimes:jpeg,png,gif|nullable',
                ]);
                $type = new location;
                $type->name  = $validated['name'];
                $type->image = "";
                $type->save();
                if ($request->hasFile('image')) {
            
                    if ($request->file('image')->isValid()) {
                        $extension = $request->image->extension();
                        $request->image->storeAs('/public/photos', "type_".$type->id.".".$extension);
                        $url = Storage::url("public/photos/"."type_".$type->id.".".$extension);
                        $type->image = $url;
                        $type->save();
                    }
                }
                return redirect('home')->with('status',"Sucess");
    }

    public function UpdateType($id){
        return view('locationForm.UpdateType',compact('id'));
    }
    public function UpdateStoreType(Request $request){
           
                $validated = $request->validate([
                    'name' => 'string|min:4|required|unique:locations',
                    'image' => 'mimes:jpeg,png,gif|nullable',
                    
                ]);
                $type = location::find($request->id);
                $url = "";
                if ($request->hasFile('image')) {
            
                    if ($request->file('image')->isValid()) {
                        $extension = $request->image->extension();
                        $request->image->storeAs('/public/photos', "type_".$type->id.".".$extension);
                        $url = Storage::url("public/photos/"."type_".$type->id.".".$extension);
                    }
                }
                
                $type->name       = $validated['name'];
                $type->image      = $url;
                $type->save();
                return redirect('home')->with('status',"Sucess");
    }

    public function DeleteStoreType(Request $request){
        $type = location::find($request->id);
        $type->delete();
        return redirect('home')->with('status',"Sucess");
    }

//------------------------------------------------------------------------------------------------------------------------------
    //products
   
    public function CreateProduct(){
        $types = location::get();
        return view('ProductForm.CreateProduct',compact('id','types'));
    }

    public function CreateStoreProduct(request $request){
        
                //
                $validated = $request->validate([
                    'name' => 'string|min:5|required|unique:locations',
                    'image' => 'mimes:jpeg,png,gif|nullable',
                    'type' => 'exists:App\location,id',
                    'date'=> 'required| after:' . date('d-m-Y'), 
                    'stock' => 'required|numeric|min: 1',
                    'price' => 'required|numeric|min: 1',
                    'description' => 'string|min:15|required'
                ]);
                $product = new product;
                $product->name  = $validated['name'];
                $product->image = "";
                $product->product_type_id = $validated['type'];
                $product->start_date = $validated['date'];
                $product->stock =  $validated['stock'];
                $product->price =  $validated['price'];
                $product->description =  $validated['description'];
                $product->save();
                if ($request->hasFile('image')) {
            
                    if ($request->file('image')->isValid()) {
                        $extension = $request->image->extension();
                        $request->image->storeAs('/public/photos', "product_".$product->id.".".$extension);
                        $url = Storage::url("public/photos/"."product_".$product->id.".".$extension);
                        $product->image = $url;
                        $product->save();
                    }
                }
                return redirect('home')->with('status',"Sucess");
    }

    public function UpdateProduct($id){
        $types = location::get();
        return view('ProductForm.UpdateProduct',compact('id','types'));
    }
    public function UpdateStoreProduct(Request $request){
           
                $validated = $request->validate([
                    'name' => 'string|min:5|required|unique:locations',
                    'image' => 'mimes:jpeg,png,gif|nullable',
                    'type' => 'exists:App\location,id',
                    'date'=> 'required| after: . date(d-m-Y)', 
                    'stock' => 'required|numeric|min: 1',
                    'price' => 'required|numeric|min: 1',
                    'description' => 'string|min:15|required'
                ]);
                $product = product::find($request->id);
                $url = "";
                if ($request->hasFile('image')) {
            
                    if ($request->file('image')->isValid()) {
                        $extension = $request->image->extension();
                        $request->image->storeAs('/public/photos', "product_".$product->id.".".$extension);
                        $url = Storage::url("public/photos/"."product_".$product->id.".".$extension);
                    }
                }
                
                $product->name  = $validated['name'];
                $product->image = $url;
                $product->product_type_id = $validated['type'];
                $product->start_date = $validated['date'];
                $product->stock =  $validated['stock'];
                $product->price =  $validated['price'];
                $product->description =  $validated['description'];
                $product->save();
                return redirect('home')->with('status',"Sucess");
    }

    public function DeleteStoreProduct(Request $request){
        $product = product::find($request->id);
        $product->delete();
        return redirect('home')->with('status',"Sucess");
    }
//--------------------------------------------------------------------------------------------------------------------------------------------------
    //user
    public function UpdateUser(){
        return view('UserForm.UpdateUser');
    }

    public function UpdateStoreUser(Request $request){
           
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255','min: 6'],
            'address'=>['required', 'string', 'min: 10','max:255'],
            'gender'=>'required|in:male,female',
            'birth'=>['required', 'before:' . date('d-m-Y')],
        ]);
        $user = Auth::user();

        
        $user->name  = $data['name'];
        $user->address = $data['address'];
        $user->gender = $data['gender'];
        $user->birthday = $data['birth'];
        $user->save();
        return redirect('home')->with('status',"Sucess");
}


}
