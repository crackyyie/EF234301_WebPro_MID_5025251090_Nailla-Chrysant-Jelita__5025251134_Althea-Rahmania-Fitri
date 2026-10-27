@extends('layout')@section('c')
<div class="card card-body mx-auto" style="max-width:420px"><h4>{{$reg?'Register':'Login'}}</h4>
<form method="post" action="{{$reg?route('register'):route('login')}}">@csrf
@if($reg)<input name="name" class="form-control mb-2" placeholder="Nama" value="{{old('name')}}" required>@endif
<input name="email" type="email" class="form-control mb-2" placeholder="Email" value="{{old('email')}}" required>
<input name="password" type="password" class="form-control mb-2" placeholder="Password" required>
@if($reg)<input name="password_confirmation" type="password" class="form-control mb-2" placeholder="Ulangi password" required>@endif
<button class="btn btn-primary w-100">{{$reg?'Daftar':'Masuk'}}</button></form>
<a class="mt-2" href="{{$reg?route('login'):route('register')}}">{{$reg?'Sudah punya akun? Login':'Belum punya akun? Register'}}</a></div>@endsection
