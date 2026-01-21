<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        // Tự định nghĩa mảng dữ liệu giả
        $products = [
            [
                'id' => 1,
                'image' => 'images/1.jpg',
                'name' => 'iPhone 15 Pro Max',
                'price' => 29990000,
                'description' => 'Chip A17 Pro, Camera 48MP'
            ],
            [
                'id' => 2,
                'image' => 'images/1.jpg',
                'name' => 'Samsung Galaxy S24 Ultra',
                'price' => 26500000,
                'description' => 'Snapdragon 8 Gen 3, Bút S-Pen'
            ],
            [
                'id' => 3,
                'image' => 'images/1.jpg',
                'name' => 'MacBook Air M3',
                'price' => 32000000,
                'description' => 'Màn hình Liquid Retina, RAM 16GB'
            ],
            [
                'id' => 4,
                'image' => 'images/1.jpg',
                'name' => 'Sony WH-1000XM5',
                'price' => 6500000,
                'description' => 'Chống ồn chủ động đỉnh cao'
            ]
        ];

        // Truyền mảng $products sang view 'product.index'
        return view('product.index', compact('products'));
    }
}