<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function show(){
        $brandList = Brand::all();
        return view('brand/list', ['brandList'=>$brandList]);
    }

    
    function delete($id){
        Brand::destroy($id);
        return redirect('/brands');
    }

    function añadir($id = null){

        if($id == null){
        $brand = new Brand();
        }else{
            $brand = Brand::findOrFail($id);
        }
        return view('/brand/añadir', ['brand' => $brand]);
    }

    function save(Request $request){

        $brand = new Brand();

        if($request->id > 0){
            $brand = Brand::findOrFail($request->id);
        }

        $request->validate([
            'name' => 'required|max:30',
        ]);

        $brand->name = $request->name;

        $brand->save();
        return redirect('/brands')->with('message', 'Marca añadida');
    }

}
