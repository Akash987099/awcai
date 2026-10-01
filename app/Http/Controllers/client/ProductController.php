<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\client\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $clientId = Auth::guard('client')->id();
        $products = Product::where('client_id', $clientId)
            ->latest('id')
            ->paginate(config('constants.pagination_limit'));

        return view('panel.client.product.index', compact('products'));
    }

    public function add()
    {
        return view('panel.client.product.add');
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $folderName = trim((string) $client->api_key);
        $folderName = $folderName !== '' ? $folderName : 'uploads/clients/' . $client->id;
        $directory = public_path("{$folderName}/uploads/products");

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $image = $request->file('image');
        $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
        $image->move($directory, $imageName);

        Product::create([
            'client_id' => $client->id,
            'name' => $request->name,
            'image' => "{$folderName}/uploads/products/{$imageName}",
        ]);

        return redirect()->route('panel.product.index')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Product::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$product) {
            return redirect()->route('panel.product.index')->with('error', 'Product not found.');
        }

        return view('panel.client.product.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();
        $request->validate([
            'id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $product = Product::where('client_id', $client->id)->find($request->id);
        if (!$product) {
            return redirect()->route('panel.product.index')->with('error', 'Product not found.');
        }

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            $folderName = trim((string) $client->api_key);
            $folderName = $folderName !== '' ? $folderName : 'uploads/clients/' . $client->id;
            $directory = public_path("{$folderName}/uploads/products");

            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $image->move($directory, $imageName);
            $imagePath = "{$folderName}/uploads/products/{$imageName}";
        }

        $product->update(['name' => $request->name, 'image' => $imagePath]);

        return redirect()->route('panel.product.index')->with('success', 'Product updated successfully.');
    }

    public function products(Request $request)
    {
        $client = $request->get('client');
        $products = Product::where('client_id', $client->id)->latest('id')->get()->map(function ($product) {
            $product->image_url = $product->image ? url('/' . ltrim($product->image, '/')) : null;
            return $product;
        });

        return response()->json(['status' => 'success', 'data' => $products]);
    }

    public function delete($id)
    {
        $product = Product::where('client_id', Auth::guard('client')->id())->find($id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found.'], 404);
        }

        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return response()->json(['status' => 'success']);
    }
}