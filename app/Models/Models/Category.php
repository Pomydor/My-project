<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable = [
        'name',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
