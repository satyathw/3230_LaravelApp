<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
      public function index(Request $request)
{
    $query = Transaction::with('event');

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $transactions = $query->latest()->paginate(20);

    return view('admin.transactions.index', compact('transactions'));
}
}
