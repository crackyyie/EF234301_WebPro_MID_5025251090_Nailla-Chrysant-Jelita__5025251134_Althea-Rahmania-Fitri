@extends('layout')@section('c')
<h4>{{$title}}</h4>
<form method="post" action="{{route($route.'s.store')}}" class="row g-2 mb-3">@csrf
@foreach($fields as $k=>[$l,$t])<div class="col"><input name="{{$k}}" type="{{$t}}" class="form-control" placeholder="{{$l}}" @if($t=='color')value="#0d6efd"@endif @if($k=='name')required @endif></div>@endforeach
<div class="col-auto"><button class="btn btn-primary">Tambah</button></div></form>
<table class="table bg-white align-middle"><tr>@foreach($fields as [$l])<th>{{$l}}</th>@endforeach<th>Jml tugas</th><th></th></tr>
@foreach($items as $i)<tr>@foreach($fields as $k=>[$l,$t])<td><input form="u{{$i->id}}" name="{{$k}}" type="{{$t}}" value="{{$i->$k ?: ($t=='color'?'#6c757d':'')}}" class="form-control form-control-sm"></td>@endforeach
<td>{{$i->tasks_count}}</td><td><button form="u{{$i->id}}" class="btn btn-sm btn-success">Simpan</button> <button form="d{{$i->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button></td></tr>@endforeach</table>
@foreach($items as $i)<form id="u{{$i->id}}" method="post" action="{{route($route.'s.update',$i)}}">@csrf @method('PUT')</form><form id="d{{$i->id}}" method="post" action="{{route($route.'s.destroy',$i)}}">@csrf @method('DELETE')</form>@endforeach
@endsection
