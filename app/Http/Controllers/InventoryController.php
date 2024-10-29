<?php

namespace App\Http\Controllers;

use App\Models\Product;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand', 'group', 'unit'])->paginate(10);
        return view('Product.Inventory.index', compact('products'));
    }
}