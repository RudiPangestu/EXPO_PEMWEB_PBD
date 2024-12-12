<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8069/products');

        if ($response->successful()) {
            $products = $response->json();
        } else {
            $products = [];
        }

        return view('produk.dashboard', compact('products'));
    }

    public function createForm()
    {
        return view('produk.create');
    }

    public function sendData(Request $request)
    {
        // Validation
        $request->validate([
            'productName' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'productDesc' => 'required|string',
            'productImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare data
        $data = [
            "userId" => auth()->id() ?? 100000001,  
            "productImg" => null,
            "productName" => $request->productName,
            "productDesc" => $request->productDesc,
            "price" => $request->price,
            "category" => $request->category,
            "createdAt" => base64_encode(now()->toDateTimeString())
        ];

        // Handle file upload
        if ($request->hasFile('productImg')) {
            // Generate a unique filename and store the image in the 'public/images' directory
            $path = $request->file('productImg')->storeAs('images', time() . '_' . $request->file('productImg')->getClientOriginalName(), 'public');
            $data['productImg'] = $path;
        }

        try {
            $response = Http::post('http://localhost:8069/products', $data);

            if ($response->successful()) {
                return redirect()->route('index.index')->with('success', 'Product added successfully!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to add product: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    private function handleFileUpload($file)
    {
        $path = $file->storeAs('public/images', time() . '_' . $file->getClientOriginalName());
        return 'images/' . basename($path);
    }
}
