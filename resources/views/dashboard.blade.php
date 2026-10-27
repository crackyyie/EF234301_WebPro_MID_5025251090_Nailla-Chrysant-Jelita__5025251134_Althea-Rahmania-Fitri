@extends('layout')@section('c')
<h2 class="mb-3"><span>Halo,</span> {{auth()->user()->name}} 👋</h2>
<div class="row g-4"><div class="col-lg-8">
<div class="row g-3 mb-3">@foreach($stats as $l=>$n)<div class="col-4"><div class="card card-body lift text-center"><div class="fs-2 fw-bold" style="color:var(--acc)">{{$n}}</div><small>{{$l}}</small></div></div>@endforeach</div>
<div class="card card-body mb-3"><div class="d-flex justify-content-between"><small>Progres selesai</small><b>{{$pct}}%</b></div><div class="progress mt-1" style="height:10px"><div class="progress-bar" style="width:{{$pct}}%;background:var(--acc)"></div></div></div>
<div class="card card-body mb-4"><h6>Tambah Cepat</h6>@if($courses->count())<form method="post" action="{{route('tasks.store')}}" class="row g-2">@csrf<input type="hidden" name="priority" value="medium"><input type="hidden" name="status" value="todo">
<div class="col-md-4"><input name="title" class="form-control" placeholder="Judul tugas" required></div><div class="col-md-3"><select name="course_id" class="form-select">@foreach($courses as $c)<option value="{{$c->id}}">{{$c->name}}</option>@endforeach</select></div>
<div class="col-md-3"><input type="datetime-local" name="deadline" class="form-control" required></div><div class="col-md-2"><button class="btn btn-primary w-100">Tambah</button></div></form>@else<a href="{{route('courses.index')}}">Tambahkan mata kuliah dulu →</a>@endif</div>
<h5 class="text-danger">Terlambat</h5>@include('tasks.list',['tasks'=>$late])
<h5 class="mt-4">Deadline 3 hari ke depan</h5>@include('tasks.list',['tasks'=>$soon])</div>
<div class="col-lg-4"><div class="card card-body mb-3"><h6>Deadline Terdekat</h6>@if($next)<div class="fw-bold">{{$next->title}}</div><div class="fs-2 fw-bold" style="color:var(--acc)" id="cd" data-t="{{$next->deadline->toIso8601String()}}">--</div>@else<p class="mb-0">Tidak ada deadline mendatang 🎉</p>@endif</div>
<div class="card card-body text-center"><h6>Fokus Pomodoro</h6><div class="display-4 fw-bold" id="pt">25:00</div>
<div class="d-flex justify-content-center gap-2 my-2"><button class="btn btn-sm btn-soft" data-m="25">25</button><button class="btn btn-sm btn-soft" data-m="5">5</button><button class="btn btn-sm btn-soft" data-m="15">15</button></div>
<div class="d-flex justify-content-center gap-2"><button class="btn btn-ink" id="ps">Mulai</button><button class="btn btn-soft" id="pr">Reset</button></div></div></div></div>@endsection
