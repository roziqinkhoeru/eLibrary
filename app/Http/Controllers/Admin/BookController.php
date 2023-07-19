<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Buku | Perpus Digital',
            'currentNav' => 'book'
        ];

        return view('admin.books.index', $data);
    }

    public function getBook()
    {
        $books = Book::with('category:id,name')
            ->select('id', 'category_id', 'isbn', 'title', 'author', 'publisher', 'year', 'stock', 'type', 'cover')
            ->get();

        dd($books);

        return ResponseFormatter::success(
            [
                'books' => $books
            ], 'Data Buku Berhasil Diambil'
        );
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Buku | Perpus Digital',
            'currentNav' => 'book'
        ];

        return view('admin.books.create', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'numeric',
            'stock' => 'required|numeric',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048',
            'type' => 'required',
        ];

        if ($request->type == 'online') {
            $rules['file'] = 'required|mimes:pdf|max:10240';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal menambahkan buku',
                    'error' => $validator->errors()->first(),
                ],
                'Gagal menambahkan buku',
                422
            );
        }

        if ($request->type == 'online') {
            $book = Book::create([
                'category_id' => $request->category_id,
                'isbn' => $request->isbn,
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'year' => $request->year ?? null,
                'stock' => $request->stock,
                'type' => $request->type,
                'file' => $request->file('file')->store('books', 'public'),
                'cover' => $request->file('cover')->store('covers', 'public'),
            ]);
        } else {
            $book = Book::create([
                'category_id' => $request->category_id,
                'isbn' => $request->isbn,
                'title' => $request->title,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'year' => $request->year ?? null,
                'stock' => $request->stock,
                'type' => $request->type,
                'cover' => $request->file('cover')->store('covers', 'public'),
            ]);
        }

        if ($book) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.book',),
                ],
                'Berhasil menambahkan buku'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal menambahkan buku',
                ],
                'Gagal menambahkan buku',
                500
            );
        }
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Buku | Perpus Digital',
            'currentNav' => 'book'
        ];

        return view('admin.books.edit', $data);
    }

    public function update(Request $request, Book $book)
    {
        $rules = [
            'category_id' => 'required',
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'numeric',
            'stock' => 'required|numeric',
            'cover' => 'image|mimes:jpg,jpeg,png|max:2048',
            'type' => 'required',
        ];

        if ($request->type == 'online') {
            $rules['file'] = 'mimes:pdf|max:10240';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal mengubah buku',
                    'error' => $validator->errors()->first(),
                ],
                'Gagal mengubah buku',
                422
            );
        }

        if ($request->type == 'online' && $request->hasFile('file')) {
            $exist = Storage::disk('public')->exists($book->file);
            if ($exist) {
                Storage::disk('public')->delete($book->file);
            }

            $updateBook = $book->update(
                [
                    'file' => $request->file('file')->store('books', 'public'),
                ]
            );
        }

        if ($request->hasFile('cover')) {
            $exist = Storage::disk('public')->exists($book->cover);
            if ($exist) {
                Storage::disk('public')->delete($book->cover);
            }

            $updateBook = $book->update(
                [
                    'category_id' => $request->category_id,
                    'isbn' => $request->isbn,
                    'title' => $request->title,
                    'author' => $request->author,
                    'publisher' => $request->publisher,
                    'year' => $request->year ?? null,
                    'stock' => $request->stock,
                    'type' => $request->type,
                    'cover' => $request->file('cover')->store('covers', 'public'),
                ]
            );
        } else {
            $updateBook = $book->update(
                [
                    'category_id' => $request->category_id,
                    'isbn' => $request->isbn,
                    'title' => $request->title,
                    'author' => $request->author,
                    'publisher' => $request->publisher,
                    'year' => $request->year ?? null,
                    'stock' => $request->stock,
                    'type' => $request->type,
                ]
            );
        }

        if ($updateBook) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.book'),
                ],
                'Berhasil mengubah buku'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal mengubah buku',
                ],
                'Gagal mengubah buku',
                500
            );
        }
    }

    public function destroy(Book $book)
    {
        $exist = Storage::disk('public')->exists($book->cover);
        if ($exist) {
            Storage::disk('public')->delete($book->cover);
        }

        if ($book->type == 'online') {
            $exist = Storage::disk('public')->exists($book->file);
            if ($exist) {
                Storage::disk('public')->delete($book->file);
            }
        }

        $deleteBook = $book->delete();

        if ($deleteBook) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.book'),
                ],
                'Berhasil menghapus buku'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal menghapus buku',
                ],
                'Gagal menghapus buku',
                500
            );
        }
    }
}
