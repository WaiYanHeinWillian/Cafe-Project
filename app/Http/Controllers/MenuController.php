<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use SebastianBergmann\CodeUnit\FunctionUnit;

class MenuController extends Controller
{
    public function index() {
        
        return view('menus.index',[
            'menus'=>Menu::latest()->filter(request(['search','category','username']))->paginate(6)->withQueryString(),
            // 'categories'=>Category::all()
        ]);
    }

    public function show(Menu $menu) {
        return view('menus.show',[
            'menu'=>$menu,
            'randomMenus'=>Menu::inRandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Menu $menu)
    {
        if(User::find(auth()->user()->id)->isSubscribed($menu))
        {
            $menu->unSubscribe();
        }else{
            $menu->subscribe();
        }
        return back();
    }

    

    // protected function getMenus()
    // {
    //     // if(request('search')){
    //     //     $menus=$menus->where('title','LIKE','%'.request('search').'%')
    //     //                  ->orWhere('body','LIKE','%'.request('search').'%');
    //     // }
    //     // return $menus->get();
    // }
}
