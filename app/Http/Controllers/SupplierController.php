<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('Contact.Supplier.index', compact('suppliers'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'tin' => 'required|string|max:20|unique:suppliers,tin',
        ]);
        $supplier = Supplier::create($validatedData);
        return redirect()->back()->with('success', 'Supplier added successfully!');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('Contact.Supplier.edit', [
            'supplier' => $supplier,
        ]);
    }
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'tin' => 'required|string|max:20',
        ]);
        $supplier = Supplier::findOrFail($id);
        $supplier->update($validatedData);
        return redirect()->route('Supplier.index')->with('success', 'Supplier updated successfully!');
    }
    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('Supplier.index')->with('success', 'Supplier deleted successfully.');
    }
}
