<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === 'teacher') {
                return response()->json(['redirect' => route('teacher.dashboard')]);
            } elseif ($user->role === 'admin') {
                return response()->json(['redirect' => route('admin.dashboard')]);
            }
        }

        return response()->json(['error' => 'Неверный логин или пароль'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Вы вышли из системы']);
    }
}
