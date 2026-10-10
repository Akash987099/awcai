<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteAboutController extends Controller
{
    public function index()
    {
        $about = WebsiteAbout::firstOrCreate(['client_id' => Auth::guard('client')->id()]);

        return view('panel.client.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:160'],
            'designation' => ['nullable', 'string', 'max:180'],
            'organization' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string',],
            'stat_one_value' => ['nullable', 'string', 'max:80'],
            'stat_one_label' => ['nullable', 'string', 'max:120'],
            'stat_two_value' => ['nullable', 'string', 'max:80'],
            'stat_two_label' => ['nullable', 'string', 'max:120'],
            'read_more_url' => ['nullable', 'url', 'max:255'],
            'primary_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'secondary_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $about = WebsiteAbout::firstOrCreate(['client_id' => $client->id]);
        foreach (['primary_image', 'secondary_image'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $this->uploadImage($request, $client, $field);
            }
        }

        $about->update($data);

        return back()->with('success', 'About content saved successfully.');
    }

    private function uploadImage(Request $request, $client, string $field): string
    {
        $key = preg_replace('/[^A-Za-z0-9_-]/', '', trim((string) $client->api_key));
        abort_if($key === '', 422, 'Client API key is missing; image cannot be saved.');

        $relativeDirectory = "{$key}/uploads/about";
        File::ensureDirectoryExists(public_path($relativeDirectory), 0755, true);
        $file = $request->file($field);
        $filename = $field . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($relativeDirectory), $filename);

        return "{$relativeDirectory}/{$filename}";
    }
}
