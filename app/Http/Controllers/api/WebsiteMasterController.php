<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\client\PncReview;
use App\Models\client\PncVideo;
use App\Models\client\WebsiteArticle;
use App\Models\client\WebsiteBlog;
use App\Models\client\WebsiteService;
use App\Models\client\WebsiteSetting;
use App\Models\client\WebsiteSlider;
use Illuminate\Http\Request;

class WebsiteMasterController extends Controller
{
    public function settings(Request $request)
    {
        $setting = WebsiteSetting::where('client_id', $this->clientId($request))->first();

        if (!$setting) {
            return response()->json(['status' => 'error', 'message' => 'Website settings not found.'], 404);
        }

        return $this->success($this->withMediaUrls($setting->toArray(), ['header_logo', 'footer_logo', 'favicon']));
    }

    public function sliders(Request $request)
    {
        $items = WebsiteSlider::where('client_id', $this->clientId($request))
            ->where('is_active', true)->orderBy('sort_order')->get()
            ->map(fn ($item) => $this->withMediaUrls($item->toArray(), ['image']));

        return $this->success($items);
    }

    public function services(Request $request)
    {
        $items = WebsiteService::where('client_id', $this->clientId($request))
            ->where('is_active', true)->orderBy('sort_order')->get()
            ->map(fn ($item) => $this->withMediaUrls($item->toArray(), ['image']));

        return $this->success($items);
    }

    public function blogs(Request $request)
    {
        $items = WebsiteBlog::where('client_id', $this->clientId($request))
            ->where('status', 'published')->latest('publish_date')->get()
            ->map(fn ($item) => $this->withMediaUrls($item->toArray(), ['featured_image']));

        return $this->success($items);
    }

    public function articles(Request $request)
    {
        $items = WebsiteArticle::where('client_id', $this->clientId($request))
            ->where('status', 'published')->latest('publish_date')->get()
            ->map(fn ($item) => $this->withMediaUrls($item->toArray(), ['featured_image']));

        return $this->success($items);
    }

    public function reviews(Request $request)
    {
        $items = PncReview::where('client_id', $this->clientId($request))
            ->where('status', 'published')->latest()->get()
            ->map(fn ($item) => $this->withMediaUrls($item->toArray(), ['image']));

        return $this->success($items);
    }

    public function videos(Request $request)
    {
        $items = PncVideo::where('client_id', $this->clientId($request))
            ->where('status', 'published')->latest()->get()
            ->map(fn ($item) => $this->withMediaUrls($item->toArray(), ['video_path']));

        return $this->success($items);
    }

    private function clientId(Request $request): int
    {
        return (int) $request->get('client')->id;
    }

    private function withMediaUrls(array $item, array $fields): array
    {
        foreach ($fields as $field) {
            if (!empty($item[$field])) {
                $item[$field . '_url'] = url('/' . ltrim($item[$field], '/'));
            }
        }

        return $item;
    }

    private function success($data)
    {
        return response()->json(['status' => 'success', 'data' => $data]);
    }
}
