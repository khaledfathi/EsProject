<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use App\Models\Comments;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function DashboardPage(){
        $CategoriesCount= Categories::all()->count(); 
        $ArticlesCount= Articles::all()->count(); 
        $CommentsCount= Comments::all()->count(); 
        return view('dashboard.statistics',[
            'CategoriesCount'=>$CategoriesCount,
            'ArticlesCount'=>$ArticlesCount,
            'CommentsCount'=>$CommentsCount
        ]); 
    }
}
