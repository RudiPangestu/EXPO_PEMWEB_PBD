<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $userId = session('user'); // Assuming 'user' session contains the user data, adjust as needed

        // Send a GET request to the API to fetch all products
        $response = Http::get('http://localhost:8069/products');

        // Initialize an empty array for products
        $products = [];

        // Check if the API response is successful
        if ($response->successful()) {
            $allProducts = $response->json(); // Get the list of products

            // Filter products that match the logged-in user's ID
            $products = array_filter($allProducts, function ($product) use ($userId) {
                return $product['userId'] == $userId; // Adjust the key if needed to match the API response structure
            });

            // Optionally, re-index the array after filtering
            $products = array_values($products);
        }

        // Return the view with the filtered products
        return view('product.dashboard', compact('products'));  
    }

    public function createForm()
    {
        return view('product.create');
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
            "userId" => Auth::id(),  
            "productImg" => null,
            "productName" => $request->productName,
            "productDesc" => $request->productDesc,
            "price" => $request->price,
            "category" => $request->category,
            "createdAt" => base64_encode(now()->toDateTimeString())
        ];

        // Handle file upload
        if ($request->hasFile('productImg')) {
            // Gunakan method store dengan visibility publik
            $path = $request->file('productImg')->store('images', 'public');
            $data['productImg'] = $path;
        }

        try {
            $response = Http::post('http://localhost:5058/api/Products', $data);

            if ($response->successful()) {
                return redirect()->route('product.index')->with('success', 'Product added successfully!');
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

    public function editForm($id)
    {
        // Use double quotes for string interpolation so $id is correctly included in the URL
        $response = Http::get("http://localhost:8069/products/{$id}");

        // Check if the API request was successful
        if ($response->successful()) {
            $product = $response->json(); // Decode the response JSON
            return view('product.edit', compact('product')); // Pass the product data to the view
        } else {
            // Handle failure (you can redirect or return an error message)
            return redirect()->route('product.index')->withErrors(['error' => 'Product not found']);
        }
    }

    public function updateData(Request $request, $id)
    {
        // Validation
        $request->validate([
            'productId' => 'required|string|max:255',
            'productName' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'productDesc' => 'required|string',
            'productImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare the data for the update
        $data = [
            "productId" => $id,
            "userId" => 100000001,  
            "productName" => $request->productName,
            "productDesc" => $request->productDesc,
            "price" => $request->price,
            "category" => $request->category,
            "createdAt" => base64_encode(now()->toDateTimeString()),
        ];

        // Handle file upload if a new image is provided
        if ($request->hasFile('productImg')) {
            // Generate a unique filename and store the image in the 'public/images' directory
            $path = $request->file('productImg')->storeAs('images', time() . '_' . $request->file('productImg')->getClientOriginalName(), 'public');
            $data['productImg'] = $path;
        }

        // dd($data);

        // Send the update request to the API
        try {
            $response = Http::put("http://localhost:8069/products/{$id}", $data);    

            if ($response->successful()) {
                return redirect()->route('product.index')->with('success', 'Product updated successfully!');
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to update product: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    public function deleteData($id)
    {
        try {
            // Send DELETE request to the API with the product ID
            $response = Http::delete("http://localhost:8069/products/{$id}");

            // Check if the request was successful
            if ($response->successful()) {
                return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
            } else {
                return redirect()->route('product.index')->withErrors(['error' => 'Failed to delete product: ' . $response->body()]);
            }
        } catch (\Exception $e) {
            // Handle any unexpected errors that occur
            return redirect()->route('product.index')->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }


}
