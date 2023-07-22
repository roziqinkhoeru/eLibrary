<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Perpus Digital',
        ];

        return view('user.home', $data);
    }
}
