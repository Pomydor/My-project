<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;




    protected $fillable = [
        'name',
        'description',
        'category_id',
        'title',
        'img',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImage(){
        if(!$this->image){
            return asset('storage/images/2022-11-10/no-image.png');
        } else{
            return asset("storage/{$this->img}");
        }
    }
}
