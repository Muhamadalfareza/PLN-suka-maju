<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class register extends Controller
{
    public function index()
    {
        return view('homepage.register');
    }

    public function actionregis(Request $request)
{
    $credentials = $request->only('name', 'email', 'password', 'password_confirmation');
    
    // Validasi bahwa password dan password_confirmation sesuai
    if ($request['password'] != $request['password_confirmation']) {
        return redirect()->back()->withErrors(['password' => 'Password confirmation does not match']);
    }

    try {
        // Mencoba membuat pengguna baru
        $daftar = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
        ]);

        if ($daftar) {
            return redirect('login');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create user']);
        }
    } catch (\Illuminate\Database\QueryException $e) {
        // Menangkap kesalahan jika ada, misalnya duplikat entri
        $errorCode = $e->errorInfo[1];
        if ($errorCode == 1062) { // 1062 adalah kode kesalahan MySQL untuk duplicate entry
            return redirect()->back()->withErrors(['email' => 'Email already exists']);
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create user: ' . $e->getMessage()]);
        }
    }
}

}
