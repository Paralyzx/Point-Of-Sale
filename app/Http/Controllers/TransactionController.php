<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar semua transaksi.
     */
    public function index()
    {
        $transactions = Transaction::with('user', 'details.item')->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Menampilkan form tambah transaksi baru.
     */
    public function create()
    {
        $items = Item::all(); // Menampilkan semua item untuk dipilih
        return view('transactions.create', compact('items'));
    }

    /**
     * Menyimpan transaksi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'total' => 'required|numeric',
            'pay_total' => 'required|numeric',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.qty' => 'required|numeric|min:1',
            'items.*.subtotal' => 'required|numeric|min:0',
        ]);

        // Simpan transaksi utama
        $transaction = Transaction::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'total' => $request->total,
            'pay_total' => $request->pay_total,
        ]);

        // Simpan setiap detail transaksi
        foreach ($request->items as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'item_id' => $item['item_id'],
                'qty' => $item['qty'],
                'subtotal' => $item['subtotal'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dari satu transaksi.
     */
    public function show($id)
    {
        $transaction = Transaction::with('user', 'details.item')->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * (Opsional) Hapus transaksi.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->details()->delete();
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
