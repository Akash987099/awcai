<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\PncVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PncVideoController extends Controller
{
    public function index()
    {
        $videos = PncVideo::where('client_id', Auth::guard('client')->id())->latest()->paginate(12);

        return view('panel.client.video.index', compact('videos'));
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();

        $data = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'video_source' => ['required', 'in:upload,youtube'],
            'video' => ['nullable', 'required_if:video_source,upload', 'prohibited_if:video_source,youtube', 'file', 'mimes:mp4,webm,mov,avi,mkv', 'max:102400'],
            'youtube_url' => ['nullable', 'required_if:video_source,youtube', 'prohibited_if:video_source,upload', 'url', 'max:255', function ($attribute, $value, $fail) {
                $host = strtolower((string) parse_url($value, PHP_URL_HOST));
                if (!in_array($host, ['youtube.com', 'www.youtube.com', 'm.youtube.com', 'youtu.be', 'www.youtu.be'], true)) {
                    $fail('Please enter a valid YouTube URL.');
                }
            }],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $data['source_type'] = $data['video_source'];
        $data['video_path'] = $request->hasFile('video') ? $this->storeVideo($request, $client->api_key) : null;
        unset($data['video'], $data['video_source']);

        PncVideo::create($data + [
            'client_id' => $client->id,
            'status' => 'published',
        ]);

        return back()->with('success', 'Video added successfully.');
    }

    public function delete($id)
    {
        $video = PncVideo::where('client_id', Auth::guard('client')->id())->findOrFail($id);

        if ($video->source_type === 'upload' && $video->video_path && File::exists(public_path($video->video_path))) {
            File::delete(public_path($video->video_path));
        }

        $video->delete();

        return response()->json(['status' => 'success', 'message' => 'Video deleted successfully.']);
    }

    private function storeVideo(Request $request, $apiKey): string
    {
        $safeApiKey = str_replace(['/', '\\', '..'], '', trim((string) $apiKey));
        abort_if($safeApiKey === '', 422, 'Invalid website storage key.');

        $directory = $safeApiKey . '/uploads/videos';
        File::ensureDirectoryExists(public_path($directory));

        $file = $request->file('video');
        $name = time() . '_' . uniqid() . '.' . strtolower($file->getClientOriginalExtension());
        $file->move(public_path($directory), $name);

        return $directory . '/' . $name;
    }
}
