<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
  public $table="films";
  public $timestamps=false;
  public function films(){
    return $this->hasMany('App\Film');
  }
  public function film(){
    return $this->beLongTo('App\Film');
  }
  public function cats(){
    return $this->beLongTo('App\Cat','cat_id','id');
  }
  public function typs(){
    return $this->beLongsToMany('App\Typ','type_id','id');
  }

}
