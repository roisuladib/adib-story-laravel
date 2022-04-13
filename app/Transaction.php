<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{
    use softDeletes;
    protected $fillable = [
        'users_id', 'code', 'insurance_price', 'shipping_price', 'total_price', 'transaction_status'
    ];
    protected $hidden = [

    ];
    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
