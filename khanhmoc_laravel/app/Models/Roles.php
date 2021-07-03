<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'fs_roles';
    protected $primaryKey = 'id';

    public function admin()
    {
        return $this->belongsToMany(Admin::class, 'fs_division_role');
    }
}
