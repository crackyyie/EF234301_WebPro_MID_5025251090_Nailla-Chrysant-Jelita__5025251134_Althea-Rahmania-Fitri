<?php
namespace App\Http\Controllers;
use App\Models\{Task, Subtask};
use Illuminate\Http\Request;
class SubtaskController extends Controller {
  function store(Request $r, Task $task) { $this->own($task)->subtasks()->create($r->validate(['title' => 'required|max:150'])); return back(); }
  function toggle(Subtask $subtask) { $this->own($subtask)->update(['is_done' => !$subtask->is_done]); return back(); }
  function destroy(Subtask $subtask) { $this->own($subtask)->delete(); return back(); }
}
