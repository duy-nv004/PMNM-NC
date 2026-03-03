<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->sale_price = $request->input('sale_price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->image = $request->input('image');
        $product->is_active = $request->input('is_active');
        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        return view('admin.product.detail', compact('products', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->sale_price = $request->input('sale_price');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->is_active = $request->input('is_active');
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->is_deleted == true) {
            $product->is_deleted = false;
        } else {
            $product->is_deleted = true;
        }
        $product->save();
        return redirect('/products');
    }
}