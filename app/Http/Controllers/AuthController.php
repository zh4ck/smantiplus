<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('student')->attempt($credentials)) {
            if(Auth::guard('student')->user()->status != 'Aktif'){
                Auth::guard('student')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->back()->with(['message' => 'Akun Anda Tidak Aktif. silahkan hubungi admin!']);
            }

            $request->session()->regenerate();
            
            return redirect('/smantiPlus');
        }
        
        if (Auth::guard('administrator')->attempt($credentials)) {
            if(Auth::guard('administrator')->user()->status != 'Aktif'){
                Auth::guard('administrator')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->back()->with(['message' => 'Akun Anda tidak aktif. silahkan hubungi admin!']);
            }

            $request->session()->regenerate();
            
            $roleID = Auth::guard('administrator')->user()->role_id;

            if($roleID == 1) {
                return redirect('/dashboard');
            }

            if($roleID == 2) {
                return redirect('/dashboard');
            }
        }

        $usernameUser = User::where('username', $request->username)->first();
        $usernameAdministrator = Administrator::where('username', $request->username)->first();

        if (!$usernameUser && !$usernameAdministrator) {
            return redirect()->back()->with(['message' => 'username tidak terdaftar']);
        }


        $passwordUser = $usernameUser ? Hash::check($request->password, $usernameUser->password) : false;
        $passwordAdministrator = $usernameAdministrator ? Hash::check($request->password, $usernameAdministrator->password) : false;

        if (!$passwordUser && !$passwordAdministrator) {
            return redirect()->back()->with(['message' => 'Password tidak sesuai']);
        }


        return redirect()->back()->with(['message' => 'Login tidak berhasil!']);
    }

    public function logoutAdministrator(Request $request) {
        Auth::guard('administrator')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function logoutStudent(Request $request) {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'class' => 'required|string',
            'email' => 'required|string|max:255|email|unique:users',
            'phone' => 'required|string|max:13',
            'password' => 'required|string|min:8', 
        ]);

        $username = User::where('username', $request->username)->first();

        if ($username) {
            return redirect()->back()->with(['message' => 'Username sudah terdaftar']);
        }

        $email = User::where('email', $request->email)->first();

        if ($email) {
            return redirect()->back()->with(['message' => 'Email sudah terdaftar']);
        }

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        return redirect('login')->with(['messageSuccess' => 'Berhasil daftar, silahkan login!']);
    }
}