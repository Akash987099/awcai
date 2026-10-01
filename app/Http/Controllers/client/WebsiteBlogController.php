<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteBlogController extends Controller
{
    public function index()
    {
        $blogs = WebsiteBlog::where('client_id', Auth::guard('client')->id())
            ->latest('publish_date')->latest('id')->paginate(12);

        return view('panel.client.blog.index', compact('blogs'));
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();
        $data = $this->validated($request, true);
        $data['featured_image'] = $this->uploadImage($request, $client);

        WebsiteBlog::create(array_merge($data, ['client_id' => $client->id]));

        return back()->with('success', 'Blog post added successfully.');
    }

    public function update(Request $request, $id)
    {
        $client = Auth::guard('client')->user();
        $blog = WebsiteBlog::where('client_id', $client->id)->find($id);

        if (!$blog) {
            return back()->with('error', 'Blog post not found.');
        }

        $data = $this->validated($request, false);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $this->uploadImage($request, $client);
        }

        $blog->update($data);

        return back()->with('success', 'Blog post updated successfully.');
    }

    public function delete($id)
    {
        $blog = WebsiteBlog::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$blog) {
            return response()->json(['status' => 'error', 'message' => 'Blog post not found.'], 404);
        }

        if ($blog->featured_image && File::exists(public_path($blog->featured_image))) {
            File::delete(public_path($blog->featured_image));
        }

        $blog->delete();

        return response()->json(['status' => 'success']);
    }

    private function validated(Request $request, bool $imageRequired): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string', 'max:10000'],
            'publish_date' => ['nullable', 'date'],
            'status' => ['required', 'in:draft,published'],
            'meta_title' => ['nullable', 'string', 'max:160'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'featured_image' => array_filter([
                $imageRequired ? 'required' : 'nullable',
                'image', 'mimes:jpg,jpeg,png,webp', 'max:4096',
            ]),
        ]);
    }

    private function uploadImage(Request $request, $client): string
    {
        $apiKey = preg_replace('/[^A-Za-z0-9_-]/', '', trim((string) $client->api_key));
        if ($apiKey === '') {
            abort(422, 'Client API key is missing; image cannot be saved.');
        }

        $relativeDirectory = "{$apiKey}/uploads/blogs";
        $directory = public_path($relativeDirectory);
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $image = $request->file('featured_image');
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $filename);

        return "{$relativeDirectory}/{$filename}";
    }
}