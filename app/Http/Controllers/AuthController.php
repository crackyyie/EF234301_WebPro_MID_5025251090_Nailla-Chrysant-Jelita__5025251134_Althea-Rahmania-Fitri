<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
  function loginForm() { return view('auth.form', ['reg' => false]); }
  function registerForm() { return view('auth.form', ['reg' => true]); }
  function login(Request $r) {
    $c = $r->validate(['email' => 'required|email', 'password' => 'required']);
    if (Auth::attempt($c, $r->boolean('remember'))) { $r->session()->regenerate(); return redirect()->route('dashboard'); }
    return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
  }
  function register(Request $r) {
    $d = $r->validate(['name' => 'required|max:100', 'email' => 'required|email|unique:users', 'password' => 'required|min:6|confirmed']);
    Auth::login(User::create($d)); return redirect()->route('dashboard');
  }
  function logout(Request $r) { Auth::logout(); $r->session()->invalidate(); $r->session()->regenerateToken(); return redirect()->route('login'); }
}
