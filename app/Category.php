<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use softDeletes;
    protected $fillable = [
        'name', 'icon', 'slug'
    ];
    protected $hidden = [
        
    ];
}
