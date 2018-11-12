<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
  protected $fillable = [
    'name', 'shopping_list_id', 'category_id'
  ];
  
  public function Category() {
    return $this->hasOne(Category::class);
  }
}
