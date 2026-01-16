<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class QueriesController extends Controller
{
    public function get()
    {
        $products = Product::all();

        return response()->json($products);
    }
}
