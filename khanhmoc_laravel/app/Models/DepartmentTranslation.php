<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DepartmentTranslation extends Model
{
    protected $table = 'fs_department_translations';
    public $timestamps = false;

    protected $fillable = ['name'];
}
