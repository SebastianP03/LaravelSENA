<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
// use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Models\Brand;
use App\Http\Controllers\BrandController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/usuario', function () {
    return "Ruta de USUARIO";
});

Route::get('/usuario/{id}', function($id){
    return "El id es: ".$id;
});

Route::get('/form/{id?}', [PersonaController::class, "mostrarForm"]
)-> where ('id', '[0-9]+');

// Route::get('/products', function(){
//     // $products = DB::table('product')->get();
//     $products = Product::get();
//     return dd($products);
// });

Route::get('/products', [ProductController::class, 'show'])->middleware('auth');


Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('prodDelete');


Route::get('/products/añadir/{id?}', [ProductController::class, 'añadir'])->name('prodAñadir');

Route::post('products/save', [ProductController::class, 'save'])->name('prodSave');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/brands', [BrandController::class, 'show'])->middleware('auth');

Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name('brandDelete');


Route::get('/brands/añadir/{id?}', [BrandController::class, 'añadir'])->name('brandAñadir');

Route::post('brands/save', [BrandController::class, 'save'])->name('brandSave');

Route::get('/categories', [CategoryController::class, 'show'])->middleware('auth');

Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');


Route::get('/categories/añadir/{id?}', [CategoryController::class, 'añadir'])->name('categoryAñadir');

Route::post('categories/save', [CategoryController::class, 'save'])->name('categorySave');

