<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  public $table = "suppliers";
  public function products(){
    return $this->hasMany('App\Products');  
  }
}
