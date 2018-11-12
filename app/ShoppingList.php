<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
  
  protected $fillable = [
    'name'
  ];
  
  // public function Product() {
  //   return $this->hasMany(Product::class);
  // }
  
}
