<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'fs_category';
    public $translatedAttributes = ['name'];
    public function Products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
