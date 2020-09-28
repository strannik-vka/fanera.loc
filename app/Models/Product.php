<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'images',
        'amount',
        'amount_old',
        'category_id',
        'status',
        'sort',
        'props'
    ];

    protected $casts = [
        'images' => 'array',
        'props' => 'array',
    ];

    public static $thumbs = [
        [250, 250]
    ];

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
