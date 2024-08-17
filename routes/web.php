<?php

use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MenuController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\DB;



Route::get('/',[MenuController::class,'index']);

Route::get('/menus/{menu:slug}',[MenuController::class,'show']);
// ->where('menu','[A-z\d\-_\&]+');

Route::post('/menus/{menu:slug}/comments',[CommentController::class,'store']);

Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'post_login'])->middleware('guest');

Route::post('/menus/{menu:slug}/subscription',[MenuController::class,'subscriptionHandler']);


//admin routes

Route::middleware('can:admin')->group(function(){
    Route::get('/admin/menus',[AdminMenuController::class,'index']);
    Route::get('/admin/menus/create',[AdminMenuController::class,'create']);

    Route::post('/admin/menus/store',[AdminMenuController::class,'store']);

    Route::delete('/admin/menus/{menu:slug}/delete',[AdminMenuController::class,'destroy']);
    Route::get('/admin/menus/{menu:slug}/edit',[AdminMenuController::class,'edit']);
    Route::patch('/admin/menus/{menu:slug}/update',[AdminMenuController::class,'update']);
});











// Route::get('/categories/{category:slug}',function(Category $category) {
//     return view('menus',[
//         'menus'=>$category->menus,
//         'categories'=>Category::all(),
//         'currentCategory'=>$category
//     ]);
// });

// Route::get('/users/{user:username}',function(User $user) {
//     return view('menus',[
//         'menus'=>$user->menus,
//         // 'categories'=>Category::all()
//     ]);
// });

