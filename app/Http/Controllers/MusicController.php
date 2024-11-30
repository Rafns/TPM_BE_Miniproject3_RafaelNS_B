<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function welcome(){
        $musics = Music::all();
        return view("welcome", compact("musics"));
    }

    public function store(Request $request){
        Music::create([
            "title" => $request -> title,
            "penyanyi" => $request -> penyanyi,
            "publication_date" => $request -> publication_date,
            "durasi" => $request -> durasi,
            "category_id" => $request -> category_name
        ]);

        return redirect(route('welcome'));

    }

    public function createMusic(){
        $categories = Category::all();
        return view("createMusic", compact('categories'));

}

}
