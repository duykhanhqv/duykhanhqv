<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'fs_product';
    public $timestamps = false;
    public $translatedAttributes = ['name', 'description', 'detail'];
    public function ProductImgs()
    {
        return $this->hasMany('App\Models\ProductImg');
    }
    public function Category()
    {
        return $this->hasOne('App\Models\Category');
    }
    public function Rating()
    {
        return $this->belongsToMany(User::class, 'fs_rating_review')->withPivot('review', 'user_id', 'created_at', 'rating');;
    }
    // public function scopePublished($query)
    // {
    //     return $query->where('published', true);
    // }

    // public function scopeUnpublished($query)
    // {
    //     return $query->where('published', false);
    // }
}
