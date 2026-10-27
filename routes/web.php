<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, DashboardController, CourseController, TagController, TaskController, SubtaskController, NoteController, ProfileController};
Route::view('/', 'landing')->middleware('guest')->name('home');
Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
  Route::post('/login', [AuthController::class, 'login']);
  Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
  Route::post('/register', [AuthController::class, 'register']);
});
Route::middleware('auth')->group(function () {
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/dashboard', DashboardController::class)->name('dashboard');
  Route::resource('courses', CourseController::class)->only(['index', 'store', 'update', 'destroy']);
  Route::resource('tags', TagController::class)->only(['index', 'store', 'update', 'destroy']);
  Route::get('/history', [TaskController::class, 'history'])->name('history');
  Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
  Route::resource('tasks', TaskController::class);
  Route::post('/tasks/{task}/subtasks', [SubtaskController::class, 'store'])->name('subtasks.store');
  Route::patch('/subtasks/{subtask}', [SubtaskController::class, 'toggle'])->name('subtasks.toggle');
  Route::delete('/subtasks/{subtask}', [SubtaskController::class, 'destroy'])->name('subtasks.destroy');
  Route::post('/tasks/{task}/notes', [NoteController::class, 'store'])->name('notes.store');
  Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
  Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
