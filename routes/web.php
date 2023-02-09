<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
});

Route::resource('product','ProductController');//تختصر كل الاجراءات مثل الdelete,update,create

Route::get('product/soft/delete{id}','ProductController@softDelete')->name('soft.delete');//الاسم عشان نناديه بصفحة الانديكس

Route::get('product/trash','ProductController@trashed')->name('product.trash');

Route::get('product/back/Product{id}','ProductController@backProduct')->name('product.back');

Route::get('product/delete/for/ever{id}','ProductController@DeleteForEver')->name('product.delete.ever');
