<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Project;
use App\Models\admin\ScreenShot;
use App\Models\PurchaseTrancation;

class UserController extends Controller
{
    protected $user;
    protected $project;
    protected $sceenshot;
    protected $purchase;

    public function __construct()
    {
        $this->user = new User();
        $this->project = new Project();
        $this->sceenshot = new ScreenShot();
        $this->purchase = new PurchaseTrancation();
    }

    public function index(){
        $projects = $this->project->where('project_transcation.user_id', Auth::guard('user')->user()->id)
        ->join('project_transcation', 'projects.id', 'project_transcation.project_id')
        ->select('project_transcation.*', 'projects.name as project_name', 'projects.download_link')
        ->paginate(config('constants.pagination_limit'));
                //    dd($projects);
        return view('user.index', compact('projects'));
    }

    public function register()
    {
        return view('user.register');
    }

    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Email is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
        ]);

        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = Hash::make($request->password);
        $this->user->save();

        return redirect()->route('user.login')->with('success', 'Account created successfully! Please login.');
    }

    public function invoices(){
        $projects = $this->project->where('project_transcation.user_id', Auth::guard('user')->user()->id)
        ->join('project_transcation', 'projects.id', 'project_transcation.project_id')
        ->select('project_transcation.*', 'projects.name as project_name', 'projects.actual_price', 'projects.price', 'projects.banner')
        ->paginate(config('constants.pagination_limit'));
                //    dd($projects);
        return view('user.invoices', compact('projects'));
    }

    public function invoiceDownload($id){
        if(!$id){
            return redirect()->back()->with('error', 'invoice id not found');
        }

        $projects = $this->project->where('project_transcation.id', $id)
        ->join('project_transcation', 'projects.id', 'project_transcation.project_id')
        ->join('users', 'project_transcation.user_id', 'users.id')
        ->select('project_transcation.*', 'projects.name as project_name', 'projects.actual_price', 'projects.price', 'projects.banner', 'users.name as username', 'users.email')
        ->first();

        if(!$projects){
            return redirect()->back()->with('error', 'no record found!');
        }

        return view('user.invoice-download', compact('projects'));

    }
}
