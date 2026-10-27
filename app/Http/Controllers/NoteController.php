<?php
namespace App\Http\Controllers;
use App\Models\{Task, TaskNote};
use Illuminate\Http\Request;
class NoteController extends Controller {
  function store(Request $r, Task $task) { $this->own($task)->notes()->create($r->validate(['type' => 'required|in:note,link', 'content' => 'required|max:500'])); return back(); }
  function destroy(TaskNote $note) { $this->own($note)->delete(); return back(); }
}
