<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function listTransaction()
    {
        $data = [
            'title' => 'Data Transaksi | Perpus Digital',
            'currentNav' => 'transaction',
            'currentNavChild' => 'listBorrow',
        ];

        return view('admin.transaction.list', $data);
    }

    public function getListTransaction()
    {
        $transactions = Transaction::with(['student:nis,name,class_school_id', 'student.class_school', 'book:id,title,isbn', 'officer:nip,name'])
            ->select('id', 'status', 'start_date', 'end_date', 'student_id', 'officer_id', 'book_id', DB::raw('DATEDIFF(NOW(),end_date) * 1000 as penalty'))
            ->where('status', 'pinjam')
            ->get();

        return ResponseFormatter::success(
            [
                'transactions' => $transactions
            ],
            'Data transaksi berhasil diambil'
        );
    }

    public function historyTransaction()
    {
        $data = [
            'title' => 'Data Transaksi | Perpus Digital',
            'currentNav' => 'transaction',
            'currentNavChild' => 'history',
        ];

        return view('admin.transaction.history', $data);
    }

    public function getHistoryTransaction()
    {
        $transactions = Transaction::with(['student:nis,name,class_school_id', 'student.class_school', 'book:id,title,isbn', 'officer:nip,name'])
            ->select('id', 'status', 'start_date', 'end_date', 'return_date', 'student_id', 'officer_id', 'book_id', 'penalty')
            ->where('status', 'kembali')
            ->orderBy('return_date', 'desc')
            ->get();

        return ResponseFormatter::success(
            [
                'transactions' => $transactions
            ],
            'Data transaksi berhasil diambil'
        );
    }
}
