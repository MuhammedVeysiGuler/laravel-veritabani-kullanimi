<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcements extends Model
{
    use HasFactory;
    protected $table= 'announcements';
    protected $guarded=['id'];
    protected $fillable=[
        'title',
        'content',
        'img_path',
        'is_deleted',
        'slug'
    ];
}
