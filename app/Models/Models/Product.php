<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Status;

class Product extends Model
{
    use HasFactory;



    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'price',
        'hit',
        'sale',
        'status_id',
        'img',
        'user_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImage(){
        if(!$this->img){
            return asset('images/no-image.png');
        } else{
            return asset("{$this->img}");
        }

    }
}
