<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminMenuController extends Controller
{
    public function index()
    {
        return view('admin.menus.index',[
            'menus'=>Menu::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        
        return view('admin.menus.create',[
            'categories'=>Category::all()
        ]);
    }

    

    public function store()
    {

        $formData=request()->validate([
            'title'=>['required'],
            'slug'=>['required',Rule::unique('menus','slug')],
            'intro'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('menus','category_id')],
        ]);
        $formData['user_id']=auth()->user()->id;
        $formData['thumbnail']=request()->file('thumbnail')?request()->file('thumbnail')->store('thumbnail'):'';

        Menu::create($formData);
        return redirect('/');
    }

    public function edit(Menu $menu)
    {
        
        return view('admin.menus.edit',[
            'menu'=>$menu,
            'categories'=>Category::all()
        ]);
    }

    public function update(Menu $menu)
    {
        $formData=request()->validate([
            'title'=>['required'],
            'slug'=>['required',Rule::unique('menus','slug')->ignore($menu->id)],
            'intro'=>['required'],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('menus','category_id')],
        ]);
        $formData['user_id']=auth()->user()->id;
        $formData['thumbnail']=request()->file('thumbnail')?request()->file('thumbnail')->store('thumbnail'):$menu->thumbnail;

        $menu->update($formData);
        return redirect('/');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
