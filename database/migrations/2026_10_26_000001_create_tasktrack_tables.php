<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
  public function up(): void {
    Schema::create('courses', function (Blueprint $t) { $t->id(); $t->foreignId('user_id')->constrained()->cascadeOnDelete(); $t->string('name'); $t->string('code')->nullable(); $t->unsignedTinyInteger('semester')->nullable(); $t->timestamps(); });
    Schema::create('tags', function (Blueprint $t) { $t->id(); $t->foreignId('user_id')->constrained()->cascadeOnDelete(); $t->string('name'); $t->string('color')->nullable(); $t->timestamps(); });
    Schema::create('tasks', function (Blueprint $t) { $t->id(); $t->foreignId('user_id')->constrained()->cascadeOnDelete(); $t->foreignId('course_id')->constrained()->cascadeOnDelete(); $t->string('title'); $t->text('description')->nullable(); $t->dateTime('deadline'); $t->string('priority')->default('medium'); $t->string('status')->default('todo'); $t->timestamps(); });
    Schema::create('subtasks', function (Blueprint $t) { $t->id(); $t->foreignId('task_id')->constrained()->cascadeOnDelete(); $t->string('title'); $t->boolean('is_done')->default(false); $t->timestamps(); });
    Schema::create('tag_task', function (Blueprint $t) { $t->id(); $t->foreignId('task_id')->constrained()->cascadeOnDelete(); $t->foreignId('tag_id')->constrained()->cascadeOnDelete(); });
    Schema::create('task_notes', function (Blueprint $t) { $t->id(); $t->foreignId('task_id')->constrained()->cascadeOnDelete(); $t->string('type')->default('note'); $t->string('content', 500); $t->timestamps(); });
  }
  public function down(): void { foreach (['task_notes','tag_task','subtasks','tasks','tags','courses'] as $n) Schema::dropIfExists($n); }
};
