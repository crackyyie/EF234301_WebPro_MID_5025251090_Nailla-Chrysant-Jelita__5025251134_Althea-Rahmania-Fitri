@extends('layout')@section('c')
<div class="d-flex justify-content-between"><h4>{{$task->title}}</h4><div class="d-flex gap-2"><a class="btn btn-outline-primary" href="{{route('tasks.edit',$task)}}">Edit</a>
<form method="post" action="{{route('tasks.destroy',$task)}}" onsubmit="return confirm('Hapus tugas?')">@csrf @method('DELETE')<button class="btn btn-outline-danger">Hapus</button></form></div></div>
<p class="text-muted">{{$task->course->name}} · {{$task->deadline->format('d M Y H:i')}} · {{$task->priority}} · {{$task->status}}</p><p>{{$task->description}}</p>
<div class="row"><div class="col-md-6"><h5>Checklist</h5>
@foreach($task->subtasks as $s)<div class="d-flex gap-2 mb-1 align-items-center"><form method="post" action="{{route('subtasks.toggle',$s)}}">@csrf @method('PATCH')<button class="btn btn-sm {{$s->is_done?'btn-success':'btn-outline-secondary'}}">✓</button></form><span class="{{$s->is_done?'text-decoration-line-through':''}}">{{$s->title}}</span>
<form method="post" action="{{route('subtasks.destroy',$s)}}">@csrf @method('DELETE')<button class="btn btn-sm btn-link text-danger">hapus</button></form></div>@endforeach
<form method="post" action="{{route('subtasks.store',$task)}}" class="d-flex gap-2 mt-2">@csrf<input name="title" class="form-control" placeholder="Sub-tugas" required><button class="btn btn-primary">Tambah</button></form></div>
<div class="col-md-6"><h5>Catatan &amp; Link</h5>
@foreach($task->notes as $n)<div class="d-flex gap-2 mb-1"><span>@if($n->type=='link')<a href="{{$n->content}}" target="_blank" rel="noopener">{{$n->content}}</a>@else{{$n->content}}@endif</span>
<form method="post" action="{{route('notes.destroy',$n)}}">@csrf @method('DELETE')<button class="btn btn-sm btn-link text-danger">hapus</button></form></div>@endforeach
<form method="post" action="{{route('notes.store',$task)}}" class="d-flex gap-2 mt-2">@csrf<select name="type" class="form-select w-auto"><option value="note">Catatan</option><option value="link">Link</option></select><input name="content" class="form-control" required><button class="btn btn-primary">Tambah</button></form></div></div>@endsection
