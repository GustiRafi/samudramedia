<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function images() {
        return $this->hasMany(bookImage::class, 'book_id', 'id');
    }

    public function category(){
        return $this->hasOne(category::class,'id','category_id');
    }
}
