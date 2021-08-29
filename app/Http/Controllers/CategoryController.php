<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function show(){
        $categoryList = Category::all();
        return view('category/list', ['categoryList'=>$categoryList]);
    }

    
    function delete($id){
        Category::destroy($id);
        return redirect('/categories');
    }

    function añadir($id = null){

        if($id == null){
        $category = new Category();
        }else{
            $category = Category::findOrFail($id);
        }
        return view('/category/añadir', ['category' => $category]);
    }

    function save(Request $request){

        $category = new Category();

        if($request->id > 0){
            $category = Category::findOrFail($request->id);
        }

        $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max100'
        ]);

        $category->name = $request->name;

        $category->save();
        return redirect('/categories')->with('message', 'Marca añadida');
    }

}
