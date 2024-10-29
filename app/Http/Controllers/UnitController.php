<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('Product.Unit.index', compact('units'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'shortTitle' => 'required|string|max:100',
        ]);
        $unit = Unit::create($validatedData);
        return redirect()->back()->with('success', 'Unit added successfully!');
    }
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('Product.Unit.edit', [
            'unit' => $unit,
        ]);
    }
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'shortTitle' => 'required|string|max:100',
        ]);
        $unit = Unit::findOrFail($id);
        $unit->update($validatedData);
        return redirect()->route('Unit.index')->with('success', 'Unit updated successfully!');
    }
    public function delete($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('Unit.index')->with('success', 'Unit deleted successfully.');
    }
}
