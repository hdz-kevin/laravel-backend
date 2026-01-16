<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueriesController extends Controller
{
    public function get()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function getById(int $id)
    {
        $product = Product::find($id);

        if (! $product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($product);
    }

    public function getNames()
    {
        $products = Product::select('id', 'name')
                           ->orderBy('name')
                           ->get();

        return response()->json($products);
    }
}
