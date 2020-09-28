<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact', 'information', 'color'
    ];

    protected $casts = [
        'contact' => 'array',
        'information' => 'array',
    ];
}
