<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Task extends Model {
  protected $guarded = [];
  protected $casts = ["deadline" => "datetime"];
  function course(){ return $this->belongsTo(Course::class); }
  function tags(){ return $this->belongsToMany(Tag::class); }
  function subtasks(){ return $this->hasMany(Subtask::class); }
  function notes(){ return $this->hasMany(TaskNote::class); }
}
