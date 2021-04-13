<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class submenus extends Model
{
    use HasFactory;
    protected $table= 'submenus';
    protected $guarded=['menu_id'];
    protected $fillable=[
        'title',
        'content',
        'is_deleted',
    ];
}
