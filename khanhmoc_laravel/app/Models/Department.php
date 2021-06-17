<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'fs_department';
    protected $primaryKey = 'id';
    public function Categorys()
    {
        return $this->hasMany('App\Models\Category');
    }
}
