<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderby('price')->paginate(6);
        return view('products.index', compact('products'));
    }

    public function create() {
        $seasons = Season::all();
        return view('products.create', compact('seasons'));
    }

    public function store(ProductRequest $request) {
        $imagePath = $request->file('image')->store('products','public');
        $product = Product::create(['name' => '$request->name'],['price' => '$request->price'], ['image' => $imagePath], ['description' => '$request->description'], ['season' => '$request->season']);
        $product->seasons()->attach($validated['season']);
        return redirect('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $fruits = Product::with('product')->KeywordSearch($request->keyword)->get();
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
