<table class="table table-sm bg-white align-middle"><tr><th>Tugas</th><th>MK</th><th>Deadline</th><th>Prioritas</th><th>Status</th><th></th></tr>
@forelse($tasks as $t)<tr><td><a href="{{route('tasks.show',$t)}}">{{$t->title}}</a> @foreach($t->tags as $g)<span class="badge" style="background:{{$g->color ?: '#6c757d'}}">{{$g->name}}</span> @endforeach</td><td>{{$t->course->name}}</td>
<td class="{{$t->status!='done'&&$t->deadline->isPast()?'text-danger fw-bold':''}}">{{$t->deadline->format('d M Y H:i')}}</td><td>{{$t->priority}}</td><td>{{$t->status}}</td>
<td class="d-flex gap-1"><form method="post" action="{{route('tasks.toggle',$t)}}">@csrf @method('PATCH')<button class="btn btn-sm btn-outline-success">{{$t->status=='done'?'Buka lagi':'Selesai'}}</button></form><a class="btn btn-sm btn-outline-primary" href="{{route('tasks.edit',$t)}}">Edit</a></td></tr>
@empty<tr><td colspan="6" class="text-center text-muted">Tidak ada tugas</td></tr>@endforelse</table>
