<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    /**
     * Filter products by name and price, chaining multiple eloquent methods
     */
    public function searchName(string $name, float $price)
    {
        $products = Product::where('name', $name)
                           // and where (debe cumplir las condiciones de ambos where)
                           ->where('price', '>', $price)
                           ->select('id', 'name', 'price')
                           ->orderBy('id', 'desc')
                           ->get();

        return response()->json($products);
    }

    /**
     * Get products that contains $value on description column
     */
    public function searchString(string $value)
    {
        $products = Product::where('description', 'like', "%{$value}%")
                           ->orWhere('name', 'like', "%{$value}%")
                           ->get();

        // Same optimized
        $products = Product::whereAny(['name', 'description'], 'like', "%{$value}%")
                           ->get();

        return response()->json($products);
    }

    /**
     * Dinamic advanced search
     */
    public function advancedSearch(Request $request)
    {
        $products = Product::where(function (Builder $query) use ($request) {
            $name = $request->input('name');
            if ($name) {
                $query->where('name', 'like', "%{$name}%");
            }

            $description = $request->input('description');
            if ($description) {
                $query->where('description', 'like', "%{$description}%");
            }

            $price = $request->input('price');
            if ($price) {
                $query->where('price', '>=', $price);
            }
        })
        ->get();

        return response()->json($products);
    }

    /**
     * Join two o more tables
     */
    public function join()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
                           ->select('products.*', 'categories.name as category')
                           ->get();

        return response()->json($products);
    }

    /**
     * Group categories and get the number of products for each category
     */
    public function groupBy()
    {
        $result = Product::join('categories', 'products.category_id', '=', 'categories.id')
                         ->groupBy('categories.id', 'categories.name')
                         ->select('categories.id', 'categories.name', DB::raw('COUNT(products.id) as total'))
                         ->get();

        return response()->json($result);
    }
}
