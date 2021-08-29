<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //Listar productos
    function show(){
        $productsList = Product::has('brand')->get();
        return view('product/list',['productsList'=>$productsList]);
    }

    function delete($id){
        Product::destroy($id);
        // $product = Product::find($id);
        // $product->delete();
        return redirect('/products');
        // return redirect()->route('products');
    }

    function añadir($id = null){

        if($id == null){
        $product = new Product();
        }else{
            $product = Product::findOrFail($id);
        }
        $brands = Brand::all();
        $categories = Category::all();
        return view('/product/añadir', ['product' => $product,'brands' => $brands]);
    }

    function save(Request $request){

        $product = new Product();

        if($request->id > 0){
            $product = Product::findOrFail($request->id);
        }

        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'brand' => 'required'
        ]);

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;

        $product->save();
        return redirect('/products')->with('message', 'Producto añadido');
    }

}
