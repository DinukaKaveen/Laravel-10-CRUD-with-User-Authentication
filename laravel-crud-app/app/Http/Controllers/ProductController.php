<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

    public function create_product(Request $request)
        {
        //dd($request);
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2'
        ]);      

        Product::create($data);

        return redirect(route('dashboard'));
        }

    }
