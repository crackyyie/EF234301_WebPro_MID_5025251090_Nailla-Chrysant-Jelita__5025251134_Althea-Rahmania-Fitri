<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProfileController extends Controller {
  function edit() { return view('profile'); }
  function update(Request $r) {
    $u = $r->user();
    $d = $r->validate(['name' => 'required|max:100', 'email' => 'required|email|unique:users,email,' . $u->id, 'password' => 'nullable|min:6|confirmed']);
    if (!$d['password']) unset($d['password']);
    $u->update($d); return back()->with('ok', 'Profil diperbarui');
  }
}
