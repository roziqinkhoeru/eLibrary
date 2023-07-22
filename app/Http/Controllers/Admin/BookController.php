<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function book()
    {
        $data = [
            'title' => 'Buku Perpustakaan | Admin Perpus Digital',
            'currentNav' => 'book',
            'currentNavChild' => 'library',
        ];

        return view('admin.book.index', $data);
    }

    public function getBook(Request $request)
    {
        $category = $request->category;
        $books = Book::with('category:id,name')
            ->select('id', 'category_id', 'isbn', 'title', 'author', 'publisher', 'year', 'stock', 'cover')
            ->where('type', 'offline')
            ->when($category != 'all', function ($query) use ($category) {
                return $query->where('category_id', $category);
            })
            ->get();

        return ResponseFormatter::success(
            [
                'books' => $books
            ],
            'Data Buku Berhasil Diambil'
        );
    }

    public function ebook()
    {
        $data =
            [
                'title' => 'E-Book | Admin Perpus Digital',
                'currentNav' => 'book',
                'currentNavChild' => 'ebook',
            ];

        return view('admin.book.ebook', $data);
    }

    public function getEBook(Request $request)
    {
        $category = $request->category;
        $books = Book::with('category:id,name')
            ->select('id', 'category_id', 'isbn', 'title', 'author', 'publisher', 'year', 'stock', 'cover', 'file')
            ->where('type', 'online')
            ->when($category != 'all', function ($query) use ($category) {
                return $query->where('category_id', $category);
            })
            ->get();

        return ResponseFormatter::success(
            [
                'books' => $books
            ],
            'Data Buku Berhasil Diambil'
        );
    }
    public function getCategories()
    {
        $categories = Category::select('id', 'name')->get();

        return ResponseFormatter::success(
            [
                'categories' => $categories
            ],
            'Data kategori berhasil diambil'
        );
    }
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $data = [
            'title' => 'Tambah Buku | Admin Perpus Digital',
            'categories' => $categories,
            'currentNav' => 'book',
            'currentNavChild' => 'addBook',
        ];

        return view('admin.book.addBook', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'id' => 'required|unique:books,id',
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
        // dd($validator->fails());

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'error' => $validator->errors()->first(),
                ],
                'Gagal menambahkan buku',
                422
            );
        }

        if ($request->type == 'online') {
            $book = Book::create([
                'id' => $request->id,
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
                'id' => $request->id,
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

        if ($request->type == 'online') {
            $redirect = route('admin.ebook');
        } else {
            $redirect = route('admin.book');
        }

        if ($book) {
            return ResponseFormatter::success(
                [
                    'redirect' => $redirect,
                ],
                'Berhasil menambahkan buku'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'error' => 'Gagal menambahkan buku',
                ],
                'Gagal menambahkan buku',
                500
            );
        }
    }

    public function edit(Book $book)
    {
        $categories = Category::select('id', 'name')->get();
        $data = [
            'title' => 'Edit Buku | Admin Perpus Digital',
            'currentNav' => 'book',
            'currentNavChild' => 'editBook',
            'book' => $book,
            'categories' => $categories,
        ];

        return view('admin.book.edit', $data);
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

        if ($request->type == "offline") {
            $redirect = route('admin.book');
        } else {
            $redirect = route('admin.ebook');
        }

        if ($updateBook) {
            return ResponseFormatter::success(
                [
                    'redirect' => $redirect,
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
