<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Department extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'fs_department';
    public $translatedAttributes = ['name'];
    public $timestamps = false;

    public function Categorys()
    {
        return $this->hasMany('App\Models\Category');
    }
}
