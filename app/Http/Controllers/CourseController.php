<?php
namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
class CourseController extends Controller {
  function v(Request $r) { return $r->validate(['name'=>'required|max:100','code'=>'nullable|max:20','semester'=>'nullable|integer|min:1|max:14']); }
  function index() { return view('crud', ['title' => 'Mata Kuliah', 'route' => 'course', 'fields' => ['name'=>['Nama','text'],'code'=>['Kode','text'],'semester'=>['Semester','number']], 'items' => Course::where('user_id', auth()->id())->withCount('tasks')->get()]); }
  function store(Request $r) { Course::create($this->v($r) + ['user_id' => auth()->id()]); return back()->with('ok', 'Tersimpan'); }
  function update(Request $r, Course $course) { $this->own($course)->update($this->v($r)); return back()->with('ok', 'Diperbarui'); }
  function destroy(Course $course) { $this->own($course)->delete(); return back()->with('ok', 'Dihapus'); }
}
