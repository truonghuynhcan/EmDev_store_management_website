<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;
    protected $table = 'stock_entries';
    public function stock_items()
    {
        return $this->hasMany(StockItem::class, 'id_stock_entry');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
