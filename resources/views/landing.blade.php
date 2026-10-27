@extends('layout')@section('wide')
<main class="container fade-up pb-5"><h1 class="hero-title my-3">Task Track</h1>
<div class="row g-4 align-items-end mt-1">
<div class="col-lg-5"><div class="d-flex gap-2 mb-4">@foreach(['#c0693c','#3b6fd4','#5f9a7c'] as $c)<span class="dot" data-c="{{$c}}" style="background:{{$c}}"></span>@endforeach</div>
<p class="mb-4" style="max-width:420px">Kelola deadline tugas, praktikum, dan ujianmu dalam satu tempat. Pantau yang mendesak, centang sub-tugas, dan tetap fokus dengan timer Pomodoro.</p>
<div class="d-flex gap-2 flex-wrap"><a class="btn btn-ink btn-lg" href="{{route('register')}}">Mulai Sekarang →</a><a class="btn btn-soft btn-lg" href="{{route('login')}}">Login</a></div></div>
<div class="col-lg-7"><div class="d-flex align-items-center gap-3"><button id="nextBtn" class="btn btn-ink rounded-circle fs-4 p-0" style="width:46px;height:46px;flex:none">›</button>
<div class="track" id="track">@foreach([['📊','Dashboard Deadline','Lihat tugas terlambat dan deadline 3 hari ke depan dalam sekali pandang.'],['✅','Checklist Sub-tugas','Pecah tugas besar jadi langkah kecil dan centang satu per satu.'],['🏷️','Tag & Filter','Kelompokkan tugas dengan tag, lalu cari dan filter secepat kilat.'],['🔗','Catatan & Link','Simpan link repo, Drive, dan referensi di setiap tugas.'],['⏱️','Timer Pomodoro','Fokus 25 menit, istirahat 5 menit, langsung dari dashboard.']] as [$i,$t,$d])
<div class="fcard lift d-flex flex-column justify-content-between"><div class="fs-1">{{$i}}</div><div><h5>{{$t}}</h5><small class="text-secondary">{{$d}}</small></div></div>@endforeach</div></div>
<div class="d-flex align-items-center gap-3 mt-3 fw-bold fs-5"><span id="cur">01</span><div class="bar"><i id="barfill"></i></div><span>05</span></div></div></div></main>@endsection
