<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\ProjectCategory;
use App\Models\admin\Technology;
use App\Models\admin\Project;
use App\Models\admin\ScreenShot;
use App\Models\admin\Blog;
use App\Models\admin\Article;
use App\Models\Subscriber;
use App\Models\QuickEnquiry;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    protected $category;
    protected $technology;
    protected $project;
    protected $sceenshot;
    protected $blog;
    protected $article;
    protected $subscribe;

    public function __construct()
    {
        $this->category = new ProjectCategory();
        $this->technology = new Technology();
        $this->project = new Project();
        $this->sceenshot = new ScreenShot();
        $this->blog = new Blog();
        $this->article = new Article();
        $this->subscribe = new Subscriber();
    }

    public function index(){
        $category = $this->category->get();
        $technology = $this->technology->get();
        $projects    = $this->project->orderBy('id', 'desc')->take(12)->get();
        $blogs  = $this->blog->orderBy('id', 'desc')->take(4)->get();
        $articles = $this->article->orderBy('id', 'desc')->take(4)->get();
        // dd($projects);
        return view('welcome', compact('category', 'technology', 'projects', 'blogs', 'articles'));
    }

    public function technologies(){
        $technology = $this->technology->get();
        return view('technologies', compact('technology'));
    }

    public function aboutUs(){
        return view('about-us');
    }
    
    public function subsribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        if (Subscriber::where('email', $request->email)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Already subscribed.'
            ], 409);
        }

        Subscriber::create([
            'email' => $request->email
        ]);

        Mail::raw("Thank you for subscribing!\nWe will keep you updated.", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Subscription Successful');
        });

        return response()->json([
            'status'  => 'success',
            'message' => 'You have successfully subscribed!'
        ]);
    }
    public function quickEnquery(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:150',
            'email'   => 'required|email|max:150',
            'phone'   => 'required|max:15',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:500',
        ]);

        QuickEnquiry::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Your enquiry has been submitted successfully. We will contact you soon.'
        ]);
    }

}
