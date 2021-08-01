<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','size','color','no_of_product','no_of_damage','no_of_lost','current'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
