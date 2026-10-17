<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Token;
use App\Models\admin\CustToken;
use App\Models\client\Product;
use App\Models\client\WebsiteService;
use App\Models\client\WebsiteBlog;
use App\Models\client\WebsiteArticle;
use App\Models\client\WebsiteNews;
use App\Models\client\WebsiteFaq;
use App\Models\client\WebsiteCmsPage;
use App\Models\client\WebsiteSlider;
use App\Models\client\PncReview;
use App\Models\client\PncVideo;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    protected $product;
    protected $service;
    protected $blog;
    protected $article;
    protected $news;
    protected $faq;
    protected $cms;
    protected $slider;
    protected $review;
    protected $videos;

    public function __construct(){
        $this->product = new Product();
        $this->service = new WebsiteService();
        $this->blog = new WebsiteBlog();
        $this->article = new WebsiteArticle();
        $this->news = new WebsiteNews();
        $this->faq = new WebsiteFaq();
        $this->cms = new WebsiteCmsPage();
        $this->slider = new WebsiteSlider();
        $this->review = new PncReview();
        $this->videos = new PncVideo();
    }

    public function index(){
        $user = Auth::guard('client')->user();
        $products = $this->product->where('client_id', $user->id)->count();
        $services = $this->service->where('client_id', $user->id)->count();
        $blogs = $this->blog->where('client_id', $user->id)->count();
        $articles = $this->article->where('client_id', $user->id)->count();
        $news = $this->news->where('client_id', $user->id)->count();
        $faqs = $this->faq->where('client_id', $user->id)->count();
        $cms = $this->cms->where('client_id', $user->id)->count();
        $slider = $this->slider->where('client_id', $user->id)->count();
        $review = $this->review->where('client_id', $user->id)->count();
        $videos = $this->videos->where('client_id', $user->id)->count();
        // dd($products);
        return view('panel.client.index' , compact('products', 'services', 'blogs', 'articles', 'news', 'faqs', 'cms', 'slider', 'review', 'videos'));
    }
    public function tokens(){
        $tokens = CustToken::with('token')->where('status' , 0)->where('customer_id', Auth::guard('client')->user()->id)->paginate(config('constants.pagination_limit'));
        return view('panel.client.tokens', compact('tokens'));
    }
}
