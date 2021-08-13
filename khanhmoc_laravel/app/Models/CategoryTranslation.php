<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategoryTranslation extends Model
{
    protected $table = 'fs_category_translations';
    public $timestamps = false;

    protected $fillable = ['name'];
}
