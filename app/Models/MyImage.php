<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyImage extends Model
{
    use HasFactory;

    protected $table ='images';

    protected $fillable = [
        'img_desc',
        'img'
    ];

    protected $casts = [
        'img' => 'array'
    ];

}
