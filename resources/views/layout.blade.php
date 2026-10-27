<!doctype html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>TaskTrack</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="{{asset('css/app.css')}}" rel="stylesheet">
<script>document.documentElement.dataset.bsTheme=localStorage.theme||(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light');document.documentElement.style.setProperty('--acc',localStorage.acc||'#c0693c')</script></head><body>
<nav class="navbar navbar-expand-lg py-3"><div class="container"><a class="brand fs-4" href="/">TaskTrack</a>
<button class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#nv"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="nv">
@auth<div class="navbar-nav mx-auto gap-lg-1">@foreach(['dashboard'=>'Dashboard','tasks.index'=>'Tugas','history'=>'Riwayat','courses.index'=>'Mata Kuliah','tags.index'=>'Tag','profile'=>'Profil'] as $r=>$l)<a class="nav-link {{request()->routeIs(explode('.',$r)[0].'*')?'active':''}}" href="{{route($r)}}">{{$l}}</a>@endforeach</div>@endauth
<div class="d-flex gap-2 align-items-center ms-auto"><button id="langBtn" class="btn btn-sm btn-soft">ID</button><button id="themeBtn" class="btn btn-sm btn-soft">🌙</button>
@auth<form method="post" action="{{route('logout')}}">@csrf<button class="btn btn-sm btn-ink" title="{{auth()->user()->name}}">Logout</button></form>@else<a class="btn btn-sm btn-ink" href="{{route('login')}}">Login</a>@endauth</div></div></div></nav>
@hasSection('wide')@yield('wide')@else<div class="container pb-5 fade-up">@if(session('ok'))<div class="alert alert-success">{{session('ok')}}</div>@endif @if($errors->any())<div class="alert alert-danger">{{$errors->first()}}</div>@endif @yield('c')</div>@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><script src="{{asset('js/app.js')}}"></script></body></html>
