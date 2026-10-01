<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteSettingController extends Controller
{
    public function show(): JsonResponse
    {
        $clientId = Auth::guard('client')->id();
        $settings = WebsiteSetting::firstOrCreate(['client_id' => $clientId]);

        return response()->json($settings);
    }

    public function update(Request $request): RedirectResponse
    {
        $client = Auth::guard('client')->user();
        $clientId = $client->id;
        $data = $request->validate([
            'website_name' => ['nullable', 'string', 'max:160'], 'tagline' => ['nullable', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'], 'primary_email' => ['nullable', 'email', 'max:160'],
            'support_email' => ['nullable', 'email', 'max:160'], 'phone' => ['nullable', 'string', 'max:30'],
            'whatsapp' => ['nullable', 'string', 'max:30'], 'address' => ['nullable', 'string', 'max:500'],
            'city' => ['nullable', 'string', 'max:100'], 'state' => ['nullable', 'string', 'max:100'],
            'pincode' => ['nullable', 'string', 'max:20'], 'meta_title' => ['nullable', 'string', 'max:160'],
            'meta_description' => ['nullable', 'string', 'max:500'], 'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'], 'linkedin_url' => ['nullable', 'url', 'max:255'],
            'youtube_url' => ['nullable', 'url', 'max:255'], 'copyright_text' => ['nullable', 'string', 'max:255'],
            'header_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'footer_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'favicon' => ['nullable', 'mimes:ico,png,svg', 'max:1024'],
        ]);

        $settings = WebsiteSetting::firstOrNew(['client_id' => $clientId]);
        $apiKey = $this->apiKeyFolder($client);

        foreach (['header_logo', 'footer_logo', 'favicon'] as $field) {
            if (!$request->hasFile($field)) continue;
            if (!$apiKey) return back()->withInput()->with('error', 'Client API key is missing; files cannot be saved.');

            $relativeDirectory = "{$apiKey}/uploads/website-settings";
            $directory = public_path($relativeDirectory);
            if (!File::exists($directory)) File::makeDirectory($directory, 0755, true);

            $file = $request->file($field);
            $filename = $field . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($directory, $filename);
            $data[$field] = "{$relativeDirectory}/{$filename}";
        }

        $settings->fill($data);
        $settings->client_id = $clientId;
        $settings->save();

        return back()->with('success', 'Website settings saved successfully.');
    }

    private function apiKeyFolder($client): ?string
    {
        $key = preg_replace('/[^A-Za-z0-9_-]/', '', trim((string) $client->api_key));
        return $key !== '' ? $key : null;
    }
}