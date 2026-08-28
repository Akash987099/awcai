<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Models\admin\Blog;
use App\Models\admin\Article;
use App\Models\admin\Technology;

class PanelController extends Controller
{
    protected $category;
    protected $blog;
    protected $article;
    protected $technology;

    public function __construct()
    {
        $this->category = new Category();
        $this->blog = new Blog();
        $this->article = new Article();
        $this->technology = new Technology();
    }
    public function index(){
        $category = $this->category->all();
        $blogs = $this->blog->orderBy('id', 'desc')->take(4)->get();
        $articles = $this->article->orderBy('id', 'desc')->take(4)->get();
        
        // dd($category);
        return view('panel.index', compact('category', 'blogs', 'articles'));
    }
    public function service(){
        return view('panel.services');
    }
    public function webname($name){
        return view('panel.user.index', compact('name'));
    }
    public function about($name){
       return view('panel.user.about-us', compact('name'));
    }
    public function services($name){
        return view('panel.user.services', compact('name'));
    }
    public function blogs($name){
        return view('panel.user.blogs', compact('name'));
    }
    public function gallery($name){
        return view('panel.user.gallery', compact('name'));
    }
    public function contact($name){
        return view('panel.user.contact-us', compact('name'));
    }
}
