<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;
    protected $table = 'stock_items';
    public function stock__entries()
    {
        return $this->belongsTo(StockEntry::class, 'id_stock_entry');
    }
}