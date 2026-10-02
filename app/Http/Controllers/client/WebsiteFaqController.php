<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\WebsiteFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteFaqController extends Controller
{
    public function index()
    {
        $faqs = WebsiteFaq::where('client_id', Auth::guard('client')->id())
            ->orderBy('sort_order')
            ->latest('id')
            ->paginate(12);

        return view('panel.client.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        WebsiteFaq::create($this->validated($request) + [
            'client_id' => Auth::guard('client')->id(),
        ]);

        return back()->with('success', 'FAQ added successfully.');
    }

    public function update(Request $request, $id)
    {
        $faq = WebsiteFaq::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$faq) {
            return back()->with('error', 'FAQ not found.');
        }

        $faq->update($this->validated($request));

        return back()->with('success', 'FAQ updated successfully.');
    }

    public function delete($id)
    {
        $faq = WebsiteFaq::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$faq) {
            return response()->json(['status' => 'error', 'message' => 'FAQ not found.'], 404);
        }

        $faq->delete();

        return response()->json(['status' => 'success']);
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:5000'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
            'status' => ['required', 'in:draft,published'],
        ]);
    }
}
