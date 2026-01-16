<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueriesController extends Controller
{
    /**
     * Get all products
     */
    public function get()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Get a product by id
     */
    public function getById(int $id)
    {
        $product = Product::find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($product);
    }

    /**
     * Get only the names of all products
     */
    public function getNames()
    {
        $products = Product::select('id', 'name')
                           ->orderBy('name')
                           ->get();

        return response()->json($products);
    }
}
