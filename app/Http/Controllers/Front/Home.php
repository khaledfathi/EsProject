<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function ListCategories(){
        $Categories = Categories::get(); 
        return $Categories;
    }
    public function ListArticles($CategoryId=0){
        if ($CategoryId){
            return  Articles::select()->where('category_id' , $CategoryId)->get(); 
        }
        return Articles::get(); 
    }
    public function HomePage(Request $request){
        if ($request->has('category_id')){
            $Articles = $this->ListArticles($request->category_id); 
        }else{
            $Articles = $this->ListArticles(); 
        }
        return view('front.home' ,[
            'Categories'=> $this->ListCategories(),
            'Articles' => $Articles, 
        ]); 
    }
}
