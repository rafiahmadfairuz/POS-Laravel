<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $units = Unit::all();
        $groups = Group::all();
        $products = Product::with(['category', 'brand', 'group', 'unit'])->get();
        return view('Product.index', compact('brands', 'categories', 'groups', 'units', 'products'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku',
            'description' => 'nullable|max:255',
            'product_type' => 'required|string',
            'initial_quantity' => 'required|integer',
            'sell_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'vat' => 'required|numeric',
            'barcode' => 'required|unique:products,barcode',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'group_id' => 'required|exists:groups,id',
            'unit_id' => 'required|exists:units,id',
        ]);

        $product = Product::create($validatedData);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        $units = Unit::all();
        $groups = Group::all();
        return view('Product.edit', compact('brands', 'categories', 'groups', 'units', 'product'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|unique:products,sku,' . $id,
            'description' => 'nullable|max:255',
            'product_type' => 'required|string',
            'initial_quantity' => 'required|integer',
            'sell_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'vat' => 'required|numeric',
            'barcode' => 'required|unique:products,barcode,' . $id,
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'group_id' => 'required|exists:groups,id',
            'unit_id' => 'required|exists:units,id',
        ]);
        $product = Product::findOrFail($id);
        $product->update($validatedData);
        return redirect()->route('Product.index')->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('Product.index')->with('success', 'Product deleted successfully.');
    }
}
