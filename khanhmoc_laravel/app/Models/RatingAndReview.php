<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingAndReview extends Model
{
    use HasFactory;
    protected $table = 'fs_rating_review';
    public $timestamps = false;
    public function User()
    {
        return $this->hasOne('App\Models\User');
    }
    public function Product()
    {
        return $this->hasOne('App\Models\Product');
    }
}