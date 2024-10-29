<?php

namespace App\Http\Controllers;

use App\Models\CustomerGroup;
use Illuminate\Http\Request;

class CustomerGroupController extends Controller
{
    public function index()
    {
        $customer_groups = CustomerGroup::all();
        return view('Contact.CustomerGroup.index', compact('customer_groups'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'discount' => 'nullable|numeric|min:0|max:10',
            'is_default' => 'required|boolean',
        ]);
        if ($validatedData['is_default']) {
            CustomerGroup::where('is_default', true)->update(['is_default' => false]);
        }
        $customerGroup = CustomerGroup::create([
            'title' => $validatedData['title'],
            'discount' => $validatedData['discount'] ?? 0.00,
            'is_default' => $validatedData['is_default'],
        ]);
        return redirect()->back()->with('success', 'New Group added successfully!');
    }
    public function edit($id)
    {
        $customerGroup = CustomerGroup::findOrFail($id);
        return view('CustomerGroup.edit', [
            'customerGroup' => $customerGroup,
        ]);
    }
    public function update($id, Request $request)
    {

    }
    public function delete($id)
    {
        $customer_group = CustomerGroup::findOrFail($id);
        $customer_group->delete();
        return redirect()->route('CustomerGroup.index')->with('success', 'Group deleted successfully.');
    }
}
