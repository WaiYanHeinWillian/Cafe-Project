<?php

use Illuminate\Support\Facades\Route;
use App\Models\Menu;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('menus',[
        'menus'=>Menu::all()
    ]);
});

Route::get('/menus/{menu}',function($slug) {


    return view('menu',[
        'menu'=>Menu::findOrFail($slug)
    ]);
})->where('menu','[A-z\d\-_]+');

