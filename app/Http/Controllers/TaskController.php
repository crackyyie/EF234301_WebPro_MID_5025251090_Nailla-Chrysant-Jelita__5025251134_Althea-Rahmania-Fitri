<?php
namespace App\Http\Controllers;
use App\Models\{Task, Course, Tag};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class TaskController extends Controller {
  private function lists() { $u = auth()->id(); return ['courses' => Course::where('user_id', $u)->get(), 'tags' => Tag::where('user_id', $u)->get()]; }
  private function listing(Request $r, $hist) {
    $q = Task::where('user_id', auth()->id())->with('course', 'tags');
    $hist ? $q->where('status', 'done') : $q->where('status', '!=', 'done');
    if ($r->q) $q->where('title', 'like', "%{$r->q}%");
    if ($r->course) $q->where('course_id', $r->course);
    if ($r->priority) $q->where('priority', $r->priority);
    if ($r->tag) $q->whereHas('tags', fn($x) => $x->where('tags.id', $r->tag));
    return view('tasks.index', ['tasks' => $q->orderBy('deadline')->get(), 'hist' => $hist] + $this->lists());
  }
  private function save(Request $r, Task $t) {
    $d = $r->validate(['title' => 'required|max:150', 'course_id' => 'required|exists:courses,id', 'description' => 'nullable', 'deadline' => 'required|date', 'priority' => 'required|in:low,medium,high', 'status' => 'required|in:todo,doing,done']);
    abort_unless(Course::where('user_id', auth()->id())->whereKey($d['course_id'])->exists(), 403);
    $t->exists ? $t->update($d) : $t = Task::create($d + ['user_id' => auth()->id()]);
    $t->tags()->sync(Tag::where('user_id', auth()->id())->whereIn('id', $r->tags ?? [])->pluck('id'));
    return redirect()->route('tasks.show', $t)->with('ok', 'Tugas tersimpan');
  }
  function index(Request $r) { return $this->listing($r, false); }
  function history(Request $r) { return $this->listing($r, true); }
  function create() { return view('tasks.form', ['task' => new Task] + $this->lists()); }
  function store(Request $r) { return $this->save($r, new Task); }
  function show(Task $task) { $this->own($task)->load('course', 'tags', 'subtasks', 'notes'); return view('tasks.show', compact('task')); }
  function edit(Task $task) { return view('tasks.form', ['task' => $this->own($task)] + $this->lists()); }
  function update(Request $r, Task $task) { return $this->save($r, $this->own($task)); }
  function destroy(Task $task) { $this->own($task)->delete(); return redirect()->route('tasks.index')->with('ok', 'Tugas dihapus'); }
  function toggle(Task $task) { $this->own($task)->update(['status' => $task->status == 'done' ? 'todo' : 'done']); return back(); }
}
