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

    public function user()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function userLikes()
    {
        if (auth()->user()) {
            return $this->user()->where('user_id', auth()->user()->id);
        }
    }
}
