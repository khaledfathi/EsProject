<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Articles as ArticlesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Articles extends Controller
{
    public function CategoryPage()
    {
        $Categories = Categories::all();
        return view('articles.categories', ['Categories' => $Categories]);
    }
    public function AddCategoryPage()
    {
        return view('articles.addcategory');
    }
    public function NewCategory(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:categories',
            ],
            [
                'name.required' => 'Category Name is required!',
                'name.unique' => "Category '$request->name' already exist!",
            ],
        );
        Categories::create([
            'name' => $request->name,
        ]);
        return redirect('articles/categories');
    }
    public function DeleteCategory(Request $request)
    {
        Categories::find($request->id)->delete();
        return redirect('articles/categories');
    }
    public function EditCategoryPage(Request $request)
    {
        return view('articles.editcategory', ['Name' => $request->name, 'Id' => $request->id]);
    }
    public function UpdateCategory(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Category Name is required!',
            ],
        );
        $IsDuplicated = Categories::Where('name', $request->name)
            ->where('id', '!=', $request->id)
            ->count();
        if ($IsDuplicated) {
            return back()->withErrors("Category '$request->name' already exist!");
        }
        $Category = Categories::find($request->id);
        $Category->update([
            'name' => $request->name,
        ]);
        return redirect('articles/categories');
    }
    public function ArticlePage()
    {
        $Articles = ArticlesModel::join('categories', 'categories.id' , '=' , 'category_id')->
            select('articles.*' , 'categories.name as category_name')->orderBy('updated_at', 'desc')->get();
        return view('articles.articles' , ['Articles'=>$Articles]);
    }
    public function AddArticlePage()
    {
        $Categories = Categories::all(); 
        return view('articles.addarticle', ['Categories'=> $Categories]);
    }
        public function NewArticle(Request $request){
                $request->validate([
            'title'=> 'required',
            'abstract'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required'
        ]);
        
        $Record = ['title'=>$request->title,
            'abstract'=>$request->abstract,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id ];  
        
            //upload image file
        if($request->has('cover_image')){
            $CoverImage = $request->file('cover_image'); 
            $FileName = Carbon::now().'_'.$CoverImage->getClientOriginalName();
            $Path = base_path('public/assets/upload/');
            $CoverImage->move($Path , $FileName);
            $ImageLocation = asset('assets/upload').'/'.$FileName;
            $Record['cover_image']= $ImageLocation;
        }
        
        ArticlesModel::create($Record); 
        return redirect('articles/articles');
    }
    public function DeleteArticle(Request $request){
        ArticlesModel::find($request->id)->delete(); 
        return redirect('articles/articles') ;
    }
    public function EditArticlePage(Request $request){
        $Categories = Categories::all(); 
        $Article = ArticlesModel::join('users' , 'users.id' , '=' , 'articles.user_id')->
            where('articles.id' , $request->id)->
            select('articles.*', 'users.name as author')->first(); 
        return view('articles.editarticle' , ['Categories'=>$Categories ,'Article'=>$Article]);
    }
    public function UpdateArticle(Request $request){
        $request->validate([
            'title'=> 'required',
            'abstract'=> 'required',
            'content'=> 'required',
            'category_id'=> 'required'
        ]);
        $Record = ['title'=>$request->title,
            'abstract'=>$request->abstract,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id ];  
        
            //upload image file
        if($request->has('cover_image')){
            $CoverImage = $request->file('cover_image'); 
            $FileName = Carbon::now().'_'.$CoverImage->getClientOriginalName();
            $Path = base_path('public/assets/upload/');
            $CoverImage->move($Path , $FileName);
            $ImageLocation = asset('assets/upload').'/'.$FileName;
            $Record['cover_image']= $ImageLocation;
        }

        ArticlesModel::find($request->id)->update($Record);
        return redirect('articles/articles'); 
    }
}
