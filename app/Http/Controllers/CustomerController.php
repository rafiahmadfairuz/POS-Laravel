<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customerGroups = CustomerGroup::all();
        $customers = Customer::with('customerGroup')->get();
        return view('Contact.Customer.index', compact('customerGroups', 'customers'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'customer_group_id' => 'required|exists:customer_groups,id',
            'tin' => 'required|string|max:20|unique:customers,tin',
        ]);
        $customer = Customer::create($validatedData);
        return redirect()->back()->with('success', 'Customer added successfully!');
    }
    public function edit($id)
    {
        $customerGroups = CustomerGroup::all();
        $customer = Customer::findOrFail($id);
        return view('Contact.Customer.edit', [
            'customer' => $customer,
            'customerGroups' => $customerGroups,
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
            'customer_group_id' => 'required|exists:customer_groups,id',
            'tin' => 'required|string|max:20',
        ]);
        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);
        return redirect()->route('Customer.index')->with('success', 'Customer updated successfully!');
    }
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('Customer.index')->with('success', 'Customer deleted successfully.');
    }
}
