<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'author',
        'cover',
    ];

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function userLikes()
    {
        if (auth()->user()) {
            return $this->likes()->where('user_id', auth()->user()->id);
        }
    }

    public function favourite()
    {
        return $this->belongsToMany(User::class,'favourites');
    }

    public function userFavourites()
    {
        if(auth()->user()){
            return $this->favourite()->where('user_id', auth()->user()->id);
        }
    }

    public function comments()
    {
        return $this->belongsToMany(User::class,'comments');
    }
}
