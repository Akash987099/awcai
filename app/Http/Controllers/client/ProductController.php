<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\Product;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $product;
    protected $customer;

    public function __construct()
    {
        $this->product = new Product();
        $this->customer = new Customer();
    }

    public function index()
    {
        $products = $this->product->orderBy('id', 'desc')->paginate(config('constants.pagination_limit'));
        return view('panel.client.product.index', compact('products'));
    }
    public function add()
    {
        return view('panel.client.product.add');
    }

    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();

        if (!$client) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $folderName = trim($client->api_key);

        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $destinationPath = public_path("{$folderName}/uploads/products");

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            $image->move($destinationPath, $imageName);

            $imagePath = "{$folderName}/uploads/products/{$imageName}";
        }

        $this->product->create([
            'client_id' => $this->customer->id,
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'no record found!');
        }
        return view('panel.client.product.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $client = Auth::guard('client')->user();

        if (!$client) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $folderName = trim($client->api_key);

        $request->validate([
            'id'   => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = $this->product->find($request->id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . preg_replace('/\s+/', '_', $image->getClientOriginalName());
            $destinationPath = public_path("{$folderName}/uploads/products");

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            if (!empty($product->image) && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $image->move($destinationPath, $imageName);
            $imagePath = "{$folderName}/uploads/products/{$imageName}";
        }

        $product->update([
            'client_id' => $this->customer->id,
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    public function products(Request $request)
    {
        $client = $request->client;
        $products = Product::where('client_id', $client->id)->get();
        if (!$products) {
            return response()->json(['status' => 'error', 'msg' => 'no record found!'], 400);
        }
        return response()->json(['status' => 'success', 'data' => $products], 200);
    }
    public function delete($id)
    {
        try {
            $product = $this->product->find($id);

            if (!$product) {
                return response()->json(['status' => 'error', 'message' => 'Product not found']);
            }

            $imagePath = public_path($product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $product->delete();

            return response()->json(['status' => 'success', 'message' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'exceptionError',
                'error' => $e->getMessage()
            ]);
        }
    }
}
