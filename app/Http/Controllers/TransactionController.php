<?php


namespace App\Http\Controllers;


use App\Transaction;

class TransactionController extends Controller
{
    public function createTransaction(Request $request): string
    {
        $transaction = Transaction::create($request->all());
        return response()->json($transaction);
    }

    public function updateTransaction(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->name = $request->input('customerId');
        $transaction->cnp = $request->input('amount');
        $transaction->save();

        return response()->json($transaction);
    }

    public function deleteTransaction($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return response()->json('Removed successfully');
    }

    public function index()
    {
        $transaction = Transaction::all();
        return response()->json($transaction);
    }
}