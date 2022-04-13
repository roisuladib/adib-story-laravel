<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use softDeletes;
    protected $fillable = [
        'banner'
    ];
    protected $hidden = [

    ];
}
