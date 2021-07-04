<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'fs_product';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public function ProductImgs()
    {
        return $this->hasMany('App\Models\ProductImg');
    }
    public function Category()
    {
        return $this->hasOne('App\Models\Category');
    }
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
}
