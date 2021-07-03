<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'fs_admin';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'fs_division_role');
    }
    /**
     * Checks user has role 
     */
    public function inRole(string $role)
    {
        return $this->roles()->where('name', $role)->count() == 1;
    }
}
