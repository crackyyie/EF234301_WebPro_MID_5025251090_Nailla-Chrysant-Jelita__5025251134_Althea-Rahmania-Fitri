@extends('layout')@section('c')
<div class="d-flex justify-content-between"><h4>{{$hist?'Riwayat Tugas Selesai':'Daftar Tugas'}}</h4>@unless($hist)<a class="btn btn-primary" href="{{route('tasks.create')}}">+ Tugas</a>@endunless</div>
<form class="row g-2 my-3"><div class="col"><input name="q" value="{{request('q')}}" class="form-control" placeholder="Cari judul"></div>
<div class="col"><select name="course" class="form-select"><option value="">Semua MK</option>@foreach($courses as $c)<option value="{{$c->id}}" @selected(request('course')==$c->id)>{{$c->name}}</option>@endforeach</select></div>
<div class="col"><select name="tag" class="form-select"><option value="">Semua tag</option>@foreach($tags as $g)<option value="{{$g->id}}" @selected(request('tag')==$g->id)>{{$g->name}}</option>@endforeach</select></div>
<div class="col"><select name="priority" class="form-select"><option value="">Semua prioritas</option>@foreach(['low','medium','high'] as $p)<option @selected(request('priority')==$p)>{{$p}}</option>@endforeach</select></div>
<div class="col-auto"><button class="btn btn-secondary">Filter</button></div></form>
@include('tasks.list')@endsection
