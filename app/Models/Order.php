<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_admin'); // 'user_id' is the foreign key in the orders table
    }
}
