<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $data = [
            'title' => 'Data Kategori | Perpus Digital',
            'currentNav' => 'category',
            'categories' => $categories
        ];

        return view('admin.category.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori | Perpus Digital',
            'currentNav' => 'category'
        ];

        return view('admin.category.create', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal menambahkan kategori',
                    'error' => $validator->errors()->first(),
                ],
                'Gagal menambahkan kategori',
                422
            );
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => request('description')
        ]);

        if ($category) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.category'),
                    'message' => 'Berhasil menambahkan kategori'
                ],
                'Berhasil menambahkan kategori'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal menambahkan kategori'
                ], 'Gagal menambahkan kategori',
            );
        }
    }

    public function edit(Category $category)
    {
        $data = [
            'title' => 'Edit Kategori | Perpus Digital',
            'currentNav' => 'category',
            'category' => $category
        ];

        return view('admin.category.edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|unique:categories,name',
            'description' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal mengubah kategori',
                    'error' => $validator->errors()->first(),
                ],
                'Gagal mengubah kategori',
                422
            );
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => request('description')
        ]);

        if ($category) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.category'),
                    'message' => 'Berhasil mengubah kategori'
                ],
                'Berhasil mengubah kategori'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal mengubah kategori'
                ], 'Gagal mengubah kategori',
            );
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();

        if ($category) {
            return ResponseFormatter::success(
                [
                    'redirect' => route('admin.category'),
                    'message' => 'Berhasil menghapus kategori'
                ],
                'Berhasil menghapus kategori'
            );
        } else {
            return ResponseFormatter::error(
                [
                    'message' => 'Gagal menghapus kategori'
                ], 'Gagal menghapus kategori',
            );
        }
    }
}
