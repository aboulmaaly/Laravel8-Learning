<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $title = 'Welcome to my laravel 8 course';
        $description = 'Created by Aboulmaaly';
        $data = [
            'productOne' => 'Iphone',
            'productTwo' => 'Samsung',
        ];
        // Directly in the view
        return view('products.index', [
            'data' => $data
        ]);
        // with method
        // return view('products.index')->with('data', $data);
        // compact method
        // return view('products.index', compact('title', 'description'));
    }

    public function about() {
        return 'About us page.';
    }
}
