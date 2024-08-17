<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Menu $menu)
    {
        
        request()->validate([
            'body'=>['required','min:1']
        ]);

        $menu->comments()->create([
            'body'=>request('body'),
            'user_id'=>auth()->user()->id
        ]);

        // Mail-System
        $subscribers=$menu->subscribers->filter(fn($subscriber)=>$subscriber->id!=auth()->id());

        $subscribers->each(function($subscriber) use($menu)
        {
            Mail::to($subscriber)->queue(new SubscriberMail($menu));
        });

        return redirect("/menus/$menu->slug");
    }
}
