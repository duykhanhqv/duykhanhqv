<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $table = 'fs_product_translations';
    public $timestamps = false;

    protected $fillable = ['name', 'description', 'detail'];
}
