<?php

namespace App\Http\Controllers;

use App\product;
use App\location;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function locations(Request $request){
        $types = location::Where('name','like', '%'.$request->search . '%')->get();
        return view('product.locations',compact('types'));
    }

    public function Products(Request $request,$id){
        $type=location::find($id)->name;
        $products = product::where([['product_type_id','=',$id],
        ['name','like', '%'.$request->search . '%'] ])->get();
        return view('product.Products',compact('products','type'));
    }

    public function details($id)
    {
        
        $product = product::where('id','=',$id)->first();
        return view('product.ProductDetails',compact('product'));
    }

    public function AddToCart(request $request,$id){
        $product = product::where('id','=',$id)->first();
        $this->validate($request,[
            'quantity'=>"numeric|min:1|max:$product->stock"
        ]);
        $user= Auth::user();
        if($user->products()->where('id', $id)->exists()){
            $user->products()->updateExistingPivot($id, ['count' => $request->quantity]);
        }
        else{
            $user->products()->attach($id,['count'=>$request->quantity]);
        }
        
        return redirect('/transaction/cart');
    }

    public function RemoveFromCart(request $request){
        $user= Auth::user();
        $user->products()->detach($request->Product_id);
        return redirect('/transaction/cart');

    }
}
