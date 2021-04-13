<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menus extends Model
{
    use HasFactory;
    protected $table= 'menus';
    protected $guarded=['id'];
    protected $fillable=[
        'title',
        'content',
        'is_deleted',
        'slug'
    ];
}
