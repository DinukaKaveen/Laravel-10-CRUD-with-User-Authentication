<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
    {
    public function products()
        {
        return view('products.products');
        }

    public function create()
        {
        return view('products.createProduct');
        }

    public function edit()
        {
        return view('products.editProduct');
        }
    }
