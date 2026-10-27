<?php
namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;
class TagController extends Controller {
  function v(Request $r) { return $r->validate(['name'=>'required|max:50','color'=>'nullable|max:9']); }
  function index() { return view('crud', ['title' => 'Tag', 'route' => 'tag', 'fields' => ['name'=>['Nama','text'],'color'=>['Warna','color']], 'items' => Tag::where('user_id', auth()->id())->withCount('tasks')->get()]); }
  function store(Request $r) { Tag::create($this->v($r) + ['user_id' => auth()->id()]); return back()->with('ok', 'Tersimpan'); }
  function update(Request $r, Tag $tag) { $this->own($tag)->update($this->v($r)); return back()->with('ok', 'Diperbarui'); }
  function destroy(Tag $tag) { $this->own($tag)->delete(); return back()->with('ok', 'Dihapus'); }
}
