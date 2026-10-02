<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteCmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class WebsiteCmsPageController extends Controller
{
    public function index()
    {
        $pages = WebsiteCmsPage::where('client_id', Auth::guard('client')->id())
            ->latest('id')
            ->paginate(12);

        return view('panel.client.cms.index', compact('pages'));
    }

    public function store(Request $request)
    {
        $clientId = Auth::guard('client')->id();
        WebsiteCmsPage::create($this->validated($request, $clientId) + ['client_id' => $clientId]);

        return back()->with('success', 'CMS page added successfully.');
    }

    public function update(Request $request, $id)
    {
        $clientId = Auth::guard('client')->id();
        $page = WebsiteCmsPage::where('client_id', $clientId)->find($id);

        if (!$page) {
            return back()->with('error', 'CMS page not found.');
        }

        $page->update($this->validated($request, $clientId, $page->id));

        return back()->with('success', 'CMS page updated successfully.');
    }

    public function delete($id)
    {
        $page = WebsiteCmsPage::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$page) {
            return response()->json(['status' => 'error', 'message' => 'CMS page not found.'], 404);
        }

        $page->delete();

        return response()->json(['status' => 'success']);
    }

    private function validated(Request $request, int $clientId, ?int $pageId = null): array
    {
        $request->merge(['slug' => Str::slug($request->input('slug') ?: $request->input('title'))]);

        return $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => [
                'required', 'string', 'max:180', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('website_cms_pages')->where(fn ($query) => $query->where('client_id', $clientId))->ignore($pageId),
            ],
            'content' => ['required', 'string', 'max:50000'],
            'status' => ['required', 'in:draft,published'],
            'meta_title' => ['nullable', 'string', 'max:160'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);
    }
}
