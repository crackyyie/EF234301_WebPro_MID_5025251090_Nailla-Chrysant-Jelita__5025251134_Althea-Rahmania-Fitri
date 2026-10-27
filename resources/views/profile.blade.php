@extends('layout')@section('c')
<h4>Edit Profil</h4><form method="post" action="{{route('profile.update')}}" class="card card-body" style="max-width:480px">@csrf @method('PUT')
<input name="name" class="form-control mb-2" value="{{old('name',auth()->user()->name)}}" required>
<input name="email" type="email" class="form-control mb-2" value="{{old('email',auth()->user()->email)}}" required>
<input name="password" type="password" class="form-control mb-2" placeholder="Password baru (kosongkan jika tidak diganti)">
<input name="password_confirmation" type="password" class="form-control mb-2" placeholder="Ulangi password baru">
<button class="btn btn-primary">Simpan</button></form>@endsection
