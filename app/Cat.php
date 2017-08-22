<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
  public $table="cats";
  public $timestamps=false;
  
  public function films(){
    return $this->hasMany('App/Film');
  }

}
