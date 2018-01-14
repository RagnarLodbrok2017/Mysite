<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  public $table = "products";
  protected $fillable = ['name','price'];
  public function supplier(){
    return $this->belongsTo('App\Supplier');  
  }

}
