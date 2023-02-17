<?php

use App\Http\Controllers\Articles;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/' , function (){
    echo('<h1>MAIN PAGE</h1> <br><a href="/login">Go to login</a>');}
);

route::get('login' , [LoginController::class , 'LoginPage'])->name('login')->middleware('guest');
route::post('login' , [LoginController::class , 'Login']);
route::get('logout' , [LoginController::class , 'Logout']);

route::middleware('auth')->group(function (){
    route::get('dashboard/statistics', [Dashboard::class , 'DashboardPage']); 
    route::get('articles/categories' , [Articles::class, 'CategoryPage']); 
    route::get('articles/addcategory' , [Articles::class, 'AddCategoryPage']); 
    route::get('articles/newcategory' , [Articles::class, 'NewCategory']); 
    route::get('articles/deletecategory' , [Articles::class, 'DeleteCategory']); 
    route::get('articles/editcategory' , [Articles::class, 'EditCategoryPage']); 
    route::get('articles/updatecategory' , [Articles::class, 'UpdateCategory']); 
    route::get('articles/articles' , [Articles::class, 'ArticlePage']); 
    route::get('articles/addarticle' , [Articles::class, 'AddArticlePage']); 
    route::post('articles/newarticle' , [Articles::class, 'NewArticle']); 
    route::get('articles/deletearticle' , [Articles::class, 'DeleteArticle']); 
    route::get('articles/editarticle' , [Articles::class, 'EditArticlePage']); 
    route::post('articles/updatearticle' , [Articles::class, 'UpdateArticle']); 
    route::get('profile' , [Profile::class, 'ProfilePage']); 
});



//for test 
route::get('ai', function (){
    $images = \App\Models\Articles::select('cover_image')->get(); 
    $html= "";
    foreach($images as $image){
        $html .= "<img src='".url($image->cover_image)."' width=300 height=200><br>"; 
    }
    return $html;
});