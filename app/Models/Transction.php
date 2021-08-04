<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['no_of_in_product', 'no_of_out_product', 'user_id', 'product_id', 'no_of_damage', 'no_of_lost'];

    public $with = ['User', 'Product'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
