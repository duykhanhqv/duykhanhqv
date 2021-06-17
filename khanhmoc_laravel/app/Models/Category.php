<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'fs_category';
    protected $primaryKey = 'id';
    public function Products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
