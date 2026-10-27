<?php
namespace App\Http\Controllers;
use App\Models\{Task, Course};
class DashboardController extends Controller {
  function __invoke() {
    $all = Task::where('user_id', auth()->id());
    $open = (clone $all)->where('status', '!=', 'done')->with('course', 'tags');
    $total = (clone $all)->count(); $done = (clone $all)->where('status', 'done')->count();
    return view('dashboard', [
      'late' => (clone $open)->where('deadline', '<', now())->orderBy('deadline')->get(),
      'soon' => (clone $open)->whereBetween('deadline', [now(), now()->addDays(3)])->orderBy('deadline')->get(),
      'next' => (clone $open)->where('deadline', '>=', now())->orderBy('deadline')->first(),
      'courses' => Course::where('user_id', auth()->id())->get(),
      'pct' => $total ? round($done / $total * 100) : 0,
      'stats' => ['Total tugas' => $total, 'Selesai' => $done, 'Belum selesai' => $total - $done],
    ]);
  }
}
