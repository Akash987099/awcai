<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Project;
use App\Models\admin\ScreenShot;
use App\Models\PurchaseTrancation;
use App\Models\Review;

class ReviewController extends Controller
{
    protected $user;
    protected $project;
    protected $sceenshot;
    protected $purchase;
    protected $review;

    public function __construct()
    {
        $this->user = new User();
        $this->project = new Project();
        $this->sceenshot = new ScreenShot();
        $this->purchase = new PurchaseTrancation();
        $this->review = new Review();
    }

    public function index()
    {
        $projects = $this->project->where('project_transcation.user_id', Auth::guard('user')->user()->id)
            ->join('project_transcation', 'projects.id', 'project_transcation.project_id')
            ->select('project_transcation.*', 'projects.name as project_name', 'projects.download_link')
            ->paginate(config('constants.pagination_limit'));
        return view('user.review.index', compact('projects'));
    }

    public function project($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'project id not found!');
        }
        $purchase = $this->purchase->where('id', $id)->first();
        $project = $this->project->where('id', $purchase->project_id)->select('name')->first();
        $review  = $this->review->where('project_id', $purchase->project_id)->first();
        // dd($project);
        if (!$purchase) {
            return redirect()->back()->with('error', 'record not found!');
        }
        return view('user.review.rating', compact('purchase', 'project', 'review'));
    }

    public function store(Request $request)
    {
        $userId = Auth::guard('user')->user()->id;

        $review = $this->review->where('user_id', $userId)
            ->where('purchase_id', $request->purchase_id)
            ->where('project_id', $request->project_id)
            ->first();

        $data = [
            'user_id' => $userId,
            'purchase_id' => $request->purchase_id,
            'project_id' => $request->project_id,
            'rating' => $request->rating,
            'description' => $request->message,
        ];

        if ($review) {
            $review->update($data);
        } else {
            $this->review->create($data);
        }

        return redirect()->back()->with('success', 'Success!');
    }
}
