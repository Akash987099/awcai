<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Project;
use App\Models\admin\ScreenShot;
use App\Models\PurchaseTrancation;
use DB;

class AdminController extends Controller
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
        return view('admin.index');
    }

    public function projectSale(){
        $projects = $this->project->join('project_transcation', 'projects.id', 'project_transcation.project_id')
        ->join('users', 'project_transcation.user_id', 'users.id')
        ->select('project_transcation.*', 'projects.name as project_name', 'projects.download_link' , 'users.name as user_name' , 'users.email')
        ->paginate(config('constants.pagination_limit'));
        return view('admin.project-sale', compact('projects'));
    }

    public function downloadApprove($id){
        if(!$id){
            return redirect()->back()->with('error', 'id requird!');
        }

        $status = $this->purchase->find($id)->status;
        if($status == 0){
            $this->purchase->where('id', $id)->update(['status' => 1]);
            return redirect()->back()->with('success', 'Success');
        }
            $this->purchase->where('id', $id)->update(['status' => 0]);
            return redirect()->back()->with('success', 'Success');

    }
    
    public function visit(){
        $visits = DB::table('daily_visitors')
    ->orderBy('id', 'desc')
    ->paginate((int) config('constants.pagination_limit', 100));

        return view('admin.visit', compact('visits'));
    }

    public function tracking(){
         $visits = DB::table('visitor_logs')
    ->orderBy('id', 'desc')
    ->paginate((int) config('constants.pagination_limit', 100));

        return view('admin.tracking', compact('visits'));
    }
    
}
