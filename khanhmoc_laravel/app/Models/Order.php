<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'fs_order';
    protected $primaryKey = 'id';
    public function OrderDetails()
    {
        return $this->hasMany('\App\Models\OrderDetail', 'order_id', 'id');
    }
}
