<?php
namespace App\Http\Controllers;
abstract class Controller {
  protected function own($m) { $o = $m->task ?? $m; abort_unless($o->user_id == auth()->id(), 403); return $m; }
}
