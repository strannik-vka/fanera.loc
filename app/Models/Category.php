<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'title',
        'description',
        'status',
        'sort',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public static $thumbs = [
        [250, 250]
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function image_url($index = 0, $thumb = false)
    {
        if ($thumb && $this->images) {
            $name = explode('/', $this->images[$index]);
            $name = end($name);
        }

        return
            $this->images
            ? ($thumb
                ? str_replace($name, $thumb . '_' . $name, $this->images[$index])
                : $this->images[$index])
            : '';
    }
}
