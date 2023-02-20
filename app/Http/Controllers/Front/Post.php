<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use App\Models\Articles;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class Post extends Controller
{
    public function PostPage(Request $request){
        $Author = User::leftjoin('articles' , 'users.id' , '=',  'articles.user_id')->select('users.name')->first();
        return view('front.viewpost',[
            'Categories' => Categories::get(), 
            'Post' => Articles::where('id' , $request->id)->first(),
            'Author'=> $Author,
        ]); 
    }
}
