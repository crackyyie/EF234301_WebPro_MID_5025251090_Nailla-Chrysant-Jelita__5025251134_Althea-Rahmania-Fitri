<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TaskNote extends Model {
  protected $guarded = [];
  function task(){ return $this->belongsTo(Task::class); }
}
