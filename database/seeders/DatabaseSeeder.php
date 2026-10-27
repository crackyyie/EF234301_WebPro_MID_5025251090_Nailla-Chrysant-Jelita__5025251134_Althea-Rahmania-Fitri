<?php
namespace Database\Seeders;
use App\Models\{User, Course, Tag, Task};
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
  public function run(): void {
    $u = User::create(['name' => 'Demo', 'email' => 'demo@tasktrack.test', 'password' => 'password']);
    $c = Course::create(['user_id' => $u->id, 'name' => 'Web Programming', 'code' => 'EF234301', 'semester' => 5]);
    $tag = Tag::create(['user_id' => $u->id, 'name' => 'UTS', 'color' => '#dc3545']);
    foreach ([['Midterm WebPro', 2], ['Laporan praktikum', -1], ['Baca modul', 6]] as [$t, $d]) {
      $task = Task::create(['user_id' => $u->id, 'course_id' => $c->id, 'title' => $t, 'deadline' => now()->addDays($d), 'priority' => 'high']);
      $task->tags()->attach($tag); $task->subtasks()->create(['title' => 'Kerjakan soal 1']);
    }
  }
}
