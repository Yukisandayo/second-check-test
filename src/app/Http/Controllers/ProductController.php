<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderby('price')->paginate(6);
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(ProductRequest $request) {
        $imagePath = $request->file('image')->store('products','public');
        $product = Product::create(['name' => '$request->name'],['price' => '$request->price'], ['image' => $imagePath], ['description' => '$request->description'], ['season' => '$request->season']);
        return redirect('products.show', $product);
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function search($keyword)
    {
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->get();
        return view('products.index', compact('products'));
    }
}
