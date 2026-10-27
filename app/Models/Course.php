<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Course extends Model {
  protected $guarded = [];
  function tasks(){ return $this->hasMany(Task::class); }
}
