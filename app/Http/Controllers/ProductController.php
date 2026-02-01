<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller
{
    // public static function middleware(){
    //     return CheckTimeAccess::class;
    // } nếu dùng thì phải implements HasMiddleware
    // function index()
    // {
    //     // Tự định nghĩa mảng dữ liệu giả
    //     $products = [
    //         [
    //             'id' => 1,
    //             'image' => 'images/1.jpg',
    //             'name' => 'iPhone 15 Pro Max',
    //             'price' => 29990000,
    //             'description' => 'Chip A17 Pro, Camera 48MP'
    //         ],
    //         [
    //             'id' => 2,
    //             'image' => 'images/1.jpg',
    //             'name' => 'Samsung Galaxy S24 Ultra',
    //             'price' => 26500000,
    //             'description' => 'Snapdragon 8 Gen 3, Bút S-Pen'
    //         ],
    //         [
    //             'id' => 3,
    //             'image' => 'images/1.jpg',
    //             'name' => 'MacBook Air M3',
    //             'price' => 32000000,
    //             'description' => 'Màn hình Liquid Retina, RAM 16GB'
    //         ],
    //         [
    //             'id' => 4,
    //             'image' => 'images/1.jpg',
    //             'name' => 'Sony WH-1000XM5',
    //             'price' => 6500000,
    //             'description' => 'Chống ồn chủ động đỉnh cao'
    //         ]
    //     ];

    //     // Truyền mảng $products sang view 'product.index'
    //     return view('product.index', compact('products'));
    // }
    // function getDetail(string $id = "123")
    // {
    //     $products = [
    //         [
    //             'id' => 1,
    //             'image' => 'images/1.jpg',
    //             'name' => 'iPhone 15 Pro Max',
    //             'price' => 29990000,
    //             'description' => 'Chip A17 Pro, Camera 48MP'
    //         ],
    //         [
    //             'id' => 2,
    //             'image' => 'images/1.jpg',
    //             'name' => 'Samsung Galaxy S24 Ultra',
    //             'price' => 26500000,
    //             'description' => 'Snapdragon 8 Gen 3, Bút S-Pen'
    //         ],
    //         [
    //             'id' => 3,
    //             'image' => 'images/1.jpg',
    //             'name' => 'MacBook Air M3',
    //             'price' => 32000000,
    //             'description' => 'Màn hình Liquid Retina, RAM 16GB'
    //         ],
    //         [
    //             'id' => 4,
    //             'image' => 'images/1.jpg',
    //             'name' => 'Sony WH-1000XM5',
    //             'price' => 6500000,
    //             'description' => 'Chống ồn chủ động đỉnh cao'
    //         ]
    //     ];
    //     $products = array_filter($products, function ($product) use ($id) {
    //         return $product['id'] == $id;
    //     });
    //     return view('product.detail', compact('products'));
    // }
    // function store(Request $request)
    // {
    //     return response()->json([
    //         'message' => 'Product stored successfully',
    //         'data' => $request->all()
    //     ]);
    // }
    public function index()
    {
        $products = Product::paginate(5);
        return view('product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->save();
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $products = Product::find($id);
        return view('product.detail', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products');
    }
}