<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'fs_order_detail';
    protected $primaryKey = 'id';
    public function Order()
    {
        return $this->belongsTo('\App\Models\Order');
    }
    public function Product()
    {
        return $this->belongsTo('\App\Models\Product');
    }
}