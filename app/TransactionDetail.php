<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use softDeletes;
    protected $fillable = [
        'transactions_id', 'products_id', 'code', 'price', 'total_qty', 'shipping_status', 'resi'
    ];
    protected $hidden = [

    ];
    public function product() {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
    public function transaction() {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }
}
