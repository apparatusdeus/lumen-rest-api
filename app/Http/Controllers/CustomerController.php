<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function createCustomer(Request $request): string
    {
        $customer = Customer::create($request->all());
        return response()->json($customer);
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->input('name');
        $customer->cnp = $request->input('cnp');
        $customer->save();

        return response()->json($customer);
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json('Removed successfully');
    }

    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }
}