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

        $request->validate([
            'title'=> 'required|min:3',
            'singer'=> 'required|max:50',
            'publication_date'=> 'required|date',
            'duration'=> 'required|numeric|min:120|max:360',
            'image'=>'required|mimes:png,jpg'
        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->title ."-". $request->singer ."-". $file->getClientOriginalPath();
        $file->move($filePath, $fileName);

        Music::create([
            "title" => $request -> title,
            "singer" => $request -> singer,
            "publication_date" => $request -> publication_date,
            "duration" => $request -> duration,
            "category_id" => $request -> category_name,
            "image" => $fileName
        ]);

        return redirect(route('welcome'));

    }

    public function createMusic(){
        $categories = Category::all();
        return view("createMusic", compact('categories'));

}

    public function editMusic($id){
        $music = Music::findOrFail($id);
        $categories = Category::all();
    return view('editMusic', compact('music', 'categories'));
    }

    public function updateMusic($id, Request $request){
        $music = Music::findOrFail($id);

        $request->validate([
            'title'=> 'required|min:3',
            'singer'=> 'required|max:50',
            'publication_date'=> 'required|date',
            'duration'=> 'required|numeric|min:120|max:360',
            'image'=>'required|mimes:png,jpg'

        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->title ."-". $request->singer ."-". $file->getClientOriginalPath();
        $file->move($filePath, $fileName);

        $music->update([
            "title" => $request -> title,
            "singer" => $request -> singer,
            "publication_date" => $request -> publication_date,
            "duration" => $request -> duration,
            "image" => $fileName,
            "category_id" => $request -> category_name,

        ]);
        return redirect(route('welcome'));

    }

    public function deleteMusic($id){
        music::destroy($id);

        return redirect(route('welcome'));
}
}
