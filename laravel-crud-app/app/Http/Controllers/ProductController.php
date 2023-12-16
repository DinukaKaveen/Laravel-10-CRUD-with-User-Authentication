<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
    {
    public function products()
        {
        $products = Product::all();
        //dd($products);
        return view('dashboard', ['products' => $products]);
        }

    public function create()
        {
        return view('products.createProduct');
        }

    public function edit(Product $product)
        {
        //dd($product)
        return view('products.editProduct', ['product' => $product]);
        }

    public function create_product(Request $request)
        {
        //dd($request);
        $data = $request->validate([
            'name'  => 'required',
            'qty'   => 'required|numeric',
            'price' => 'required|decimal:0,2'
        ]);

        Product::create($data);

        return redirect(route('dashboard'));
        }

    public function edit_product(Product $product, Request $request)
        {
        $data = $request->validate([
            'name'  => 'required',
            'qty'   => 'required|numeric',
            'price' => 'required|decimal:0,2'
        ]);

        $product->update($data);

        return redirect(route('dashboard'));
        }

    }
