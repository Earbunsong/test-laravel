<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:product-list|product-create|product-edit|product-delete'],["only" => ["index","show"]]);
        $this->middleware(['permission:product-create'],["only" => ["create","store"]]);
        $this->middleware(['permission:product-edit'],["only" => ["edit","update"]]);
        $this->middleware(['permission:product-delete'],["only" => ["destroy"]]);
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Product::create([
            'name' => $request->name
        ]);
        return redirect()->route('products.index')->with('success', 'Product created');
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $proudct = Product::find($id);
        $proudct->name = $request->name;
        $proudct->save();
        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    public function destroy(string $id)
    {
        $proudct = Product::find($id);
        $proudct->delete();
        return redirect()->route('products.index')->with('success', 'Proudct deleted');
    }
}
