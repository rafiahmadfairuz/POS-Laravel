<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Group;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $units = Unit::all();
        $groups = Group::all();
        $products = Product::with(['category', 'brand', 'group', 'unit'])->orderBy('id','desc')->get();
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
            'image' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png|max:2000'
        ]);
         if($request->hasFile('image')) {
            $jumlahGambar = count($request->file('image'));
            if($jumlahGambar < 6 || $jumlahGambar > 6) {
                return redirect()->back()->with('image', 'Image Harus Berjumlah 6');
            } else {
                foreach($request->file('image') as $image) {
                    $penyimpananGambar = $image->store('img', 'public');
                    $gambar[] = $penyimpananGambar;
                 }
            }
            $semuaGambar = implode(',', $gambar);
         }
        $validatedData['image'] = $semuaGambar;
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
        $product = Product::findOrFail($id);
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
            'image' => 'required',
            'image.*' => 'mimes:jpg,jpeg,png|max:2000',
        ]);
        if($request->hasFile('image')){
            $jumlahGambar = count($request->file('image'));
            if($jumlahGambar < 6 || $jumlahGambar > 6) {
                 return redirect()->back()->with('image', 'Image Harus Berjumlah 6');
            } else {
                $hapusGambar = explode(',', $product->image);
                    foreach($hapusGambar as $g) {
                        Storage::disk('public')->delete($g);
                    }
                    foreach($request->file('image') as $image) {
                    $penyimpananGambar = $image->store('img', 'public');
                    $gambar[] = $penyimpananGambar;
                 }
                $semuaGambar = implode(',', $gambar);
            }
            $validatedData['image'] = $semuaGambar;
        }
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
