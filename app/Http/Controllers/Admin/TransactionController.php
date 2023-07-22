<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            ->orderBy('end_date', 'asc')
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

    public function create() {
        $data = [
            'title' => 'Tambah Transaksi | Perpus Digital',
            'currentNav' => 'transaction',
            'currentNavChild' => 'create',
        ];

        return view('admin.transaction.create', $data);
    }

    public function store(Request $request) {
        $rules = [
            'student_id' => 'required|exists:students,nis',
            'book_id' => 'required|exists:books,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'error' => $validator->errors()->first()
                ],
                'Data gagal ditambahkan',
                422
            );
        }

        $transaction = Transaction::create([
            'student_id' => $request->student_id,
            'book_id' => $request->book_id,
            'officer_id' => auth()->user()->officer_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pinjam',
        ]);

        if ($transaction) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.list.transaction')
                ],
                'Data berhasil ditambahkan'
            );
        }

        return ResponseFormatter::error(
            [
                'error' => 'Data gagal ditambahkan'
            ],
            'Data gagal ditambahkan',
            422
        );
    }
}
