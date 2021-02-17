<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index()
    {
    	$data = ['categories' => DB::table('categories')->orderBy('nama')->get()];
    	return view('auth.login', $data);
    }

    public function prosesLogin(Request $request)
    {
    	$result = auth()->attempt([
    		'email' => $request->email,
    		'password' => $request->password,
    	]);

    	if($result) {
    		$request->session()->regenerate();
    		return redirect('/books');
    	}

    	return redirect('/login')->with('error', 'Email dan password salah.');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
