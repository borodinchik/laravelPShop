<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'description', 'category_id', 'img', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
