<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Project;
use App\Models\admin\ScreenShot;
use App\Models\PurchaseTrancation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected $project;
    protected $sceenshot;
    
    public function __construct()
    {
        $this->project = new Project();
        $this->sceenshot = new ScreenShot();
        $this->purchase = new PurchaseTrancation();
    }

    public function index() {
        $projects = $this->project->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('project_list', compact('projects'));
    }

    public function project($name) {
        $url = trim($name);
        $project = $this->project->where('project_url', $url)->first();
        if(!$project){
            return redirect()->back()->with('project not found!');
        }
        $screenshot = $this->sceenshot->where('project_id', $project->id)->get();
        // dd($screenshot);
        if(!$project){
            return view('errors.404');
        }
        return view('project.index', compact('project', 'screenshot'));
    }

    public function Projectlist(){
        $projects = $this->project->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('user.project-list', compact('projects'));
    }
    
    public function purchase($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'Project id is required');
        }

        $project = $this->project->where('id', $id)->first();
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found!');
        }
        return view('user.purchase', compact('project'));
    }
    
    public function purchasePayment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'payment_mode' => 'required|string',
            'amount'       => 'required|numeric',
            'project_id'       => 'required|numeric',
            'ref_no'       => 'required|string',
            'bank'         => 'nullable|string',
            'remarks'      => 'nullable|string'
        ]);

        $this->purchase->create([
            'user_id'      => Auth::guard('user')->user()->id,
            'project_id'   => $request->project_id ?? null,
            'payment_mode' => $request->payment_mode,
            'amount'       => $request->amount,
            'ref_no'       => $request->ref_no,
            'bank'         => $request->bank,
            'remark'       => $request->remarks,
            'status'       => 0,
        ]);

        return redirect()->route('user.index')->with('success', 'Success!');
    }
    
    public function complateProject(){
        return view('complete-projects');
    }
    
}
