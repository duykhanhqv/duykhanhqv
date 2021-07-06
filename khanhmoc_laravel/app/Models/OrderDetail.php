<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'fs_order_detail';
    public function Orders()
    {
        return $this->hasOne('\App\Models\Order');
    }
    public function Product()
    {
        return $this->belongsTo('\App\Models\Product');
    }
}