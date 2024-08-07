<?php

namespace App\Models;

use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Menu 
{

    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;

    public function __construct($title,$slug,$intro,$body,$date)
    {
        $this->title=$title;
        $this->slug=$slug;
        $this->intro=$intro;
        $this->body=$body;
        $this->date=$date;

    }

    public static function all()
    {

        return collect(File::files(resource_path("menus")))->map(function($file) {
            $obj=YamlFrontMatter::parseFile($file);
            return new Menu($obj->title,$obj->slug,$obj->intro,$obj->body(),$obj->date);
        })->sortByDesc('date');
        
        
    }

    public static function find($slug)
    {
        $menus=static::all();
        return $menus->firstWhere('slug',$slug);
    }

    public static function findOrFail($slug)
    {
        $menu=static::find($slug);
        
            if(!$menu){
                throw new ModelNotFoundException();
            }
        return $menu;
    }

}