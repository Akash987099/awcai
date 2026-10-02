<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteNewsController extends Controller
{
    public function index()
    {
        $news = WebsiteNews::where('client_id', Auth::guard('client')->id())
            ->latest('publish_date')
            ->paginate(12);

        return view('panel.client.news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();
        $data = $this->data($request);
        $data['featured_image'] = $this->upload($request, $client);

        WebsiteNews::create($data + ['client_id' => $client->id]);

        return back()->with('success', 'News item added successfully.');
    }

    public function delete($id)
    {
        $news = WebsiteNews::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$news) {
            return response()->json(['status' => 'error', 'message' => 'News item not found.'], 404);
        }

        if ($news->featured_image && File::exists(public_path($news->featured_image))) {
            File::delete(public_path($news->featured_image));
        }

        $news->delete();

        return response()->json(['status' => 'success']);
    }

    private function data(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'summary' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string', 'max:10000'],
            'publish_date' => ['nullable', 'date'],
            'status' => ['required', 'in:draft,published'],
            'meta_title' => ['nullable', 'string', 'max:160'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'featured_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);
    }

    private function upload(Request $request, $client): string
    {
        $key = str_replace(['/', '\\', '..'], '', trim((string) $client->api_key));
        abort_if($key === '', 422, 'Client API key is missing.');

        $directory = "{$key}/uploads/news";
        File::ensureDirectoryExists(public_path($directory), 0755, true);

        $file = $request->file('featured_image');
        $name = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($directory), $name);

        return "{$directory}/{$name}";
    }
}
