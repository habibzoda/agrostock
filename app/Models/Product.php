<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  public function reviews()
  {
    return $this->hasMany(Review::class, 'product_id', 'id');
  }

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user_id');
  }
}
