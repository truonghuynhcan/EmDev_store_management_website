<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_product');
    }
}
