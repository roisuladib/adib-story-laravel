<?php

namespace App;

use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use softDeletes;
    protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'qty', 'desciption', 'slug'
    ];
    protected $hidden = [

    ];

    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
