<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteSliderController extends Controller
{
    public function index()
    {
        $sliders = WebsiteSlider::where('client_id', Auth::guard('client')->id())
            ->orderBy('sort_order')->latest('id')->paginate(12);

        return view('panel.client.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:120'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $apiKey = $this->apiKeyFolder($client);
        if (!$apiKey) return back()->withInput()->with('error', 'Client API key is missing; image cannot be saved.');

        $relativeDirectory = "{$apiKey}/uploads/sliders";
        $directory = public_path($relativeDirectory);
        if (!File::exists($directory)) File::makeDirectory($directory, 0755, true);

        $image = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $filename);

        WebsiteSlider::create([
            'client_id' => $client->id,
            'title' => $data['title'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'image' => "{$relativeDirectory}/{$filename}",
            'is_active' => true,
        ]);

        return back()->with('success', 'Slider image added successfully.');
    }

    public function delete($id)
    {
        $slider = WebsiteSlider::where('client_id', Auth::guard('client')->id())->find($id);
        if (!$slider) return response()->json(['status' => 'error', 'message' => 'Slider image not found.'], 404);

        if ($slider->image && File::exists(public_path($slider->image))) File::delete(public_path($slider->image));
        $slider->delete();

        return response()->json(['status' => 'success']);
    }

    private function apiKeyFolder($client): ?string
    {
        $key = preg_replace('/[^A-Za-z0-9_-]/', '', trim((string) $client->api_key));
        return $key !== '' ? $key : null;
    }
}