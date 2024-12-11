<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
{
    // Fetch products from the API
    $response = Http::get('http://localhost:5058/api/Products');

    // Check if the request was successful
    if ($response->successful()) {
        $data = $response->json(); // Decode JSON to an associative array

        // Extract products that are complete and not references
        $products = array_filter($data['$values'], function ($product) {
            return isset($product['$ref']) or isset($product['productName']);
        });        

        // Convert the array values back to a numerical array if needed
        $products = array_values($products);
    } else {
        // Handle API failure (optional)
        $products = []; // Set to an empty array to avoid errors in the view
    }

    // Pass products to the view
    return view('produk.index', compact('products'));
}
}
