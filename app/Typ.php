<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
  public $table="typs";
  public $timestamps=false;
  public function films(){
    return $this->beLongsToMany('App\Film');
  }
}
