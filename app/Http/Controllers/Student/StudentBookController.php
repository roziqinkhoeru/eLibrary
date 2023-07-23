<?php

namespace App\Http\Controllers\Student;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class StudentBookController extends Controller
{
    public function book()
    {
        $categories = Category::select('slug', 'name')->get();
        $data = [
            'title' => 'Buku Perpustakaan | Perpus Digital',
            'categories' => $categories,
        ];

        return view('user.book.index', $data);
    }

    public function getBook(Request $request)
    {
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

    public function ebook()
    {
        Log::info("ebook");
        $categories = Category::select('slug', 'name')->get();
        $data = [
            'title' => 'E-book Perpustakaan | Perpus Digital',
            'categories' => $categories,
        ];

        return view('user.book.ebook', $data);
    }

    public function getEbook(Request $request)
    {

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

    public function downloadEbook(Book $book)
    {
        $filePath = asset("storage/$book->file");
        if (Storage::disk('public')->exists($book->file)) {
            // menambahkan jumlah download
            $book->increment('download');
            return ResponseFormatter::success([
                'url' => $filePath,
            ]);
        } else {
            // Tangani jika file tidak ditemukan
            abort(404, 'File tidak ditemukan');
        }
    }
}
