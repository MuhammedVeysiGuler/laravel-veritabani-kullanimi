<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $table= 'events';
    protected $guarded=['id'];
    protected $fillable=[
        'title',
        'content',
        'img_path',
        'is_deleted',
        'slug',
    ];
}
