<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('category')->latest()->paginate(10);

        return view('pages.products.index', [
            "products" => $products,
        ]);
    }

    public function create() {
        $categories = Category::all();

        return view('pages.products.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "category_id" => "required",
            "sku" => "required",
        ], [
            "name.required" => "The name field is required.",
            "name.min" => "The name must be at least 3 characters.",
            "price.required" => "The price field is required.",
            "stock.required" => "The stock field is required.",
            "category_id.required" => "The category field is required.",
            "sku.required" => "The sku field is required.",
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Product created successfully.');
    }

    public function edit($id) {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function delete($id) {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products')->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "category_id" => "required",
            "sku" => "required",
        ], [
            "name.required" => "The name field is required.",
            "name.min" => "The name must be at least 3 characters.",
            "price.required" => "The price field is required.",
            "stock.required" => "The stock field is required.",
            "category_id.required" => "The category field is required.",
            "sku.required" => "The sku field is required.",
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Product updated successfully.');
    }
}
