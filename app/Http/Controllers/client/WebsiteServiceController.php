<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WebsiteServiceController extends Controller
{
    public function index()
    {
        $services = WebsiteService::where('client_id', Auth::guard('client')->id())
            ->orderBy('sort_order')->latest('id')->paginate(12);

        return view('panel.client.service.index', compact('services'));
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();
        $data = $this->validated($request, true);
        $data['image'] = $this->uploadImage($request, $client);

        WebsiteService::create(array_merge($data, [
            'client_id' => $client->id,
            'is_active' => true,
        ]));

        return back()->with('success', 'Service added successfully.');
    }

    public function update(Request $request, $id)
    {
        $client = Auth::guard('client')->user();
        $service = WebsiteService::where('client_id', $client->id)->find($id);

        if (!$service) {
            return back()->with('error', 'Service not found.');
        }

        $data = $this->validated($request, false);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, $client);
        }

        $service->update($data);

        return back()->with('success', 'Service updated successfully.');
    }

    public function delete($id)
    {
        $service = WebsiteService::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$service) {
            return response()->json(['status' => 'error', 'message' => 'Service not found.'], 404);
        }

        if ($service->image && File::exists(public_path($service->image))) {
            File::delete(public_path($service->image));
        }

        $service->delete();

        return response()->json(['status' => 'success']);
    }

    private function validated(Request $request, bool $imageRequired): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'short_description' => ['nullable', 'string', 'max:300'],
            'description' => ['nullable', 'string', 'max:3000'],
            'service_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'image' => array_filter([
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

        $relativeDirectory = "{$apiKey}/uploads/services";
        $directory = public_path($relativeDirectory);
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $image = $request->file('image');
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $filename);

        return "{$relativeDirectory}/{$filename}";
    }
}