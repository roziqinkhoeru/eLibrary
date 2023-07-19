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
        $data = [
            'title' => 'Data Kategori | Perpus Digital',
            'currentNav' => 'category'
        ];

        return view('admin.categories.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori | Perpus Digital',
            'currentNav' => 'category'
        ];

        return view('admin.categories.create', $data);
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

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kategori | Perpus Digital',
            'currentNav' => 'category',
            'id' => $id
        ];

        return view('admin.categories.edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required',
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
}
