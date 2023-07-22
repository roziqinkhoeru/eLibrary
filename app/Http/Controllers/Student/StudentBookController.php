<?php

namespace App\Http\Controllers\Student;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class StudentBookController extends Controller
{
    public function book() {
        $categories = Category::select('slug', 'name')->get();
        $data = [
            'title' => 'Buku Perpustakaan | Perpus Digital',
            'categories' => $categories,
        ];

        return view('user.book.index', $data);
    }

    public function getBook(Request $request) {

        $books = Book::query()
            ->with('category')
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                });
            })
            ->when($request->sort, function ($query) use ($request) {
                switch ($request->sort) {
                    case 'newRelease':
                        $query->orderBy('year', 'desc');
                        break;
                }
            })
            ->where('type', 'offline')
            ->get();


        return ResponseFormatter::success([
            'bookCount' => $books->count(),
            'books' => $books,
        ]);
    }

    public function ebook() {
        $categories = Category::select('slug', 'name')->get();
        $data = [
            'title' => 'E-book Perpustakaan | Perpus Digital',
            'categories' => $categories,
        ];

        return view('user.book.ebook', $data);
    }

    public function getEbook(Request $request) {

        $books = Book::query()
            ->with('category')
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                });
            })
            ->when($request->sort, function ($query) use ($request) {
                switch ($request->sort) {
                    case 'newRelease':
                        $query->orderBy('year', 'desc');
                        break;
                    case 'popular':
                        $query->orderBy('download', 'desc');
                        break;
                }
            })
            ->where('type', 'online')
            ->get();


        return ResponseFormatter::success([
            'bookCount' => $books->count(),
            'books' => $books,
        ]);
    }
}
