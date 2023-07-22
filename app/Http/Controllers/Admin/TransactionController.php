<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Transaksi | Perpus Digital',
            'currentNav' => 'transaction',
            'currentNavChild' => 'transaction',
        ];

        return view('admin.transaction.index', $data);
    }

    public function getTransaction()
    {
        $transactions = Transaction::with(['student:nis,name,class_school_id', 'book:id,title,cover,type'])
            ->select('id', 'status', 'start_date', 'end_date')
            ->where('status', 'pinjam')
            ->get();

        dd($transactions);
        return ResponseFormatter::success(
            [
                'transactions' => $transactions
            ],
            'Data transaksi berhasil diambil'
        );
    }
}
