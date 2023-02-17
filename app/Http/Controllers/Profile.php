<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class Profile extends Controller
{
    public function ProfilePage(){
        $ArticlesCount = Articles::where('user_id' , auth()->user()->id )->count();
        return view('profile.profile' , ['ArticlesCount'=> $ArticlesCount]); 
    }
}
