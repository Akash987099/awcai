<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Project;
use App\Models\admin\ProjectCategory;
use App\Models\admin\ScreenShot;
use App\Models\admin\ProjectTech;
use App\Models\admin\Technology;

class ProjectController extends Controller
{

    protected $category;
    protected $project;
    protected $screen;
    protected $projecttech;
    protected $technology;

    public function __construct()
    {
        $this->category      = new ProjectCategory();
        $this->project       = new Project();
        $this->screen        = new ScreenShot();
        $this->projecttech   = new ProjectTech();
        $this->technology    = new Technology();
    }

    public function index()
    {

        $projects = $this->project->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        // dd($projects);
        return view('admin.project.index', compact('projects'));
    }

    public function add()
    {
        $category = $this->category->get();
        $technology = $this->technology->get();
        // dd($technology);
        return view('admin.project.add', compact('category', 'technology'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'project_url' => 'required|string',
            'preview_link' => 'required|string',
            'base_price' => 'required',
            'actual_price' => 'required',
            'category' => 'required|integer',
            'project_technology' => 'required',
            'description' => 'required|string',
            'thumnail' => 'required|image|mimes:jpg,jpeg,png',
            'banner' => 'required|image|mimes:jpg,jpeg,png',
            'screenshort.*' => 'image|mimes:jpg,jpeg,png'
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->project_url = $request->project_url;
        $project->preview_link = $request->preview_link;
        $project->price = $request->base_price;
        $project->actual_price = $request->actual_price;
        $project->category = $request->category;
        $project->project_technology = $request->project_technology;
        $project->description = $request->description;


        if ($request->hasFile('thumnail')) {
            $thumbFile = $request->file('thumnail');
            $thumbName = time() . '_thumb_' . $thumbFile->getClientOriginalName();
            $thumbPath = public_path('uploads/projects/thumbnails');
            $thumbFile->move($thumbPath, $thumbName);
            $project->thumnail = 'uploads/projects/thumbnails/' . $thumbName;
        }

        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerPath = public_path('uploads/projects/banners');
            $bannerFile->move($bannerPath, $bannerName);
            $project->banner = 'uploads/projects/banners/' . $bannerName;
        }
        $project->save();

        if ($request->hasFile('screenshort')) {
            foreach ($request->file('screenshort') as $key => $image) {
                $imageName = time() . '_' . $key . '_' . $image->getClientOriginalName();
                $imagePath = public_path('uploads/projects/screenshots');
                $image->move($imagePath, $imageName);

                $this->screen->create([
                    'project_id' => $project->id,
                    'image' => 'uploads/projects/screenshots/' . $imageName
                ]);
            }
        }

        return redirect()->back()->with('success', 'Project added successfully!');
    }

    public function edit($id)
    {
        $project = $this->project::find($id);
        $category = $this->category->get();
        $technology = $this->technology->get();
        // dd($technology);
        return view('admin.project.edit', compact('category', 'technology', 'project'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'project_url' => 'required|string',
            'preview_link' => 'required|string',
            'base_price' => 'required',
            'actual_price' => 'required',
            'category' => 'nullable|integer',
            'project_technology' => 'nullable',
            'description' => 'required|string',
            'thumnail' => 'nullable|image|mimes:jpg,jpeg,png',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $project = Project::findOrFail($id);

        $project->name = $request->name;
        $project->project_url = $request->project_url;
        $project->preview_link = $request->preview_link;
        $project->price = $request->base_price;
        $project->actual_price = $request->actual_price;
        // $project->category = $request->category;
        // $project->project_technology = $request->project_technology;
        $project->description = $request->description;

        // ✅ Update thumbnail if new file uploaded
        if ($request->hasFile('thumnail')) {
            $thumbFile = $request->file('thumnail');
            $thumbName = time() . '_thumb_' . $thumbFile->getClientOriginalName();
            $thumbPath = public_path('uploads/projects/thumbnails');
            $thumbFile->move($thumbPath, $thumbName);
            $project->thumnail = 'uploads/projects/thumbnails/' . $thumbName;
        }

        // ✅ Update banner if new file uploaded
        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerPath = public_path('uploads/projects/banners');
            $bannerFile->move($bannerPath, $bannerName);
            $project->banner = 'uploads/projects/banners/' . $bannerName;
        }

        $project->save();

        return redirect()->back()->with('success', 'Project updated successfully!');
    }
}
