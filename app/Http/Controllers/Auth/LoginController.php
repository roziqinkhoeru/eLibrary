<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        $user = Auth::user();

        if ($user) {
            return redirect()->intended();
        }

        $data =  [
            'title' => 'Login | Perpus Digital',
            'ptSection' => '54px'
        ];

        return view('auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // Form salah diisi
                return $request->ajax()
                    ? ResponseFormatter::error(
                        [
                            'error' => $validator->errors()->first(),
                        ],
                        'Harap isi form dengan benar',
                        400,
                    )
                    : back()->with(['error' => $validator->errors()->first()]);
            }

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $role = $user->role_id;
                // check role
                if ($role == 1) {
                    // Logout
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    $msg = 'Mohon maaf email/password Anda tidak sesuai';
                    return $request->ajax()
                        ? ResponseFormatter::error(
                            [
                                'error' => 'Unauthorized',
                            ],
                            'Mohon maaf email/password Anda tidak sesuai',
                            401,
                        )
                        : back()->withErrors($msg);
                } else if ($role == 2) {
                    $student = Student::where('nis', $user->student_id)->first();
                    // check if student is nonactive
                    if ($student->status == 0) {
                        // Logout
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                        $msg = 'Mohon maaf akun Anda belum aktif';
                        return $request->ajax()
                            ? ResponseFormatter::error(
                                [
                                    'error' => 'Unauthorized',
                                ],
                                'Mohon maaf akun Anda belum aktif',
                                401,
                            )
                            : back()->withErrors($msg);
                    }
                    $redirect = redirect('/');
                    $request->session()->regenerate();
                    return $request->ajax() ? ResponseFormatter::success(['redirect' => $redirect->getTargetUrl()], 'Authenticated') : $redirect;
                }
                // $redirect = redirect()->intended('/');
                // $request->session()->regenerate();
                // return $request->ajax() ? ResponseFormatter::success(['redirect' => $redirect->getTargetUrl()], 'Authenticated') : $redirect;
                // return redirect()->intended();
            } else {
                $msg = 'Mohon maaf email/password Anda tidak sesuai';
                return $request->ajax()
                    ? ResponseFormatter::error(
                        [
                            'error' => 'Unauthorized',
                        ],
                        'Mohon maaf email/password Anda tidak sesuai',
                        401,
                    )
                    : back()->withErrors($msg);
            }
        } catch (Exception $error) {
            Log::channel('exception')->info($error);
            if ($request->ajax()) {
                return ResponseFormatter::error($error, 'Terjadi kegagalan, silahkan coba beberapa saat lagi', 500);
            } else {
                return abort(500, $error);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminLogin()
    {
        $user = Auth::user();

        if ($user) {
            $role = $user->role_id;
            if ($role == 1) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        $data =  [
            'title' => 'Login | Admin Perpus Digital',
        ];

        return view('admin.auth.login', $data);
    }

    public function adminAuthenticate(Request $request)
    {
        try {
            $rules = [
                'email' => 'required',
                'password' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                // Form salah diisi
                return $request->ajax()
                    ? ResponseFormatter::error(
                        [
                            'error' => $validator->errors(),
                        ],
                        'Harap isi form dengan benar',
                        400,
                    )
                    : back()->with(['error' => $validator->errors()]);
            }

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $redirect = redirect()->route('admin.dashboard');
                $request->session()->regenerate();
                return $request->ajax() ? ResponseFormatter::success(['redirect' => $redirect->getTargetUrl()], 'Authenticated') : $redirect;
                // return redirect()->intended();
            } else {
                $msg = 'Mohon maaf email/password Anda tidak sesuai';
                return $request->ajax()
                    ? ResponseFormatter::error(
                        [
                            'error' => 'Unauthorized',
                        ],
                        'Mohon maaf email/password Anda tidak sesuai',
                        401,
                    )
                    : back()->withErrors($msg);
            }
        } catch (Exception $error) {
            Log::channel('exception')->info($error);
            if ($request->ajax()) {
                return ResponseFormatter::error($error, 'Terjadi kegagalan, silahkan coba beberapa saat lagi', 500);
            } else {
                return abort(500, $error);
            }
        }
    }
}
