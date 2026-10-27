@extends('layout')@section('c')
<h4>{{$task->exists?'Edit':'Tambah'}} Tugas</h4>
<form method="post" action="{{$task->exists?route('tasks.update',$task):route('tasks.store')}}" class="card card-body">@csrf @if($task->exists)@method('PUT')@endif
<label>Judul</label><input name="title" class="form-control mb-2" required value="{{old('title',$task->title)}}">
<label>Mata kuliah</label><select name="course_id" class="form-select mb-2">@foreach($courses as $c)<option value="{{$c->id}}" @selected(old('course_id',$task->course_id)==$c->id)>{{$c->name}}</option>@endforeach</select>
<label>Deadline</label><input type="datetime-local" name="deadline" class="form-control mb-2" required value="{{old('deadline',optional($task->deadline)->format('Y-m-d\TH:i'))}}">
<div class="row mb-2"><div class="col"><label>Prioritas</label><select name="priority" class="form-select">@foreach(['low','medium','high'] as $p)<option @selected(old('priority',$task->priority ?? 'medium')==$p)>{{$p}}</option>@endforeach</select></div>
<div class="col"><label>Status</label><select name="status" class="form-select">@foreach(['todo','doing','done'] as $p)<option @selected(old('status',$task->status ?? 'todo')==$p)>{{$p}}</option>@endforeach</select></div></div>
<label>Tag</label><div class="mb-2">@foreach($tags as $g)<label class="me-3"><input type="checkbox" name="tags[]" value="{{$g->id}}" @checked($task->exists&&$task->tags->contains($g->id))> {{$g->name}}</label>@endforeach</div>
<label>Deskripsi</label><textarea name="description" class="form-control mb-3">{{old('description',$task->description)}}</textarea>
<button class="btn btn-primary">Simpan</button></form>@endsection
