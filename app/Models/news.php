<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $table= 'news';
    protected $guarded=['id'];
    protected $fillable=[
        'title',
        'content',
        'img_path',
        'is_deleted',
        'slug'
    ];
}
