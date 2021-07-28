<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['sticky'];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {

        return 'string';
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function similar()
    {
        return $this->belongsToMany(self::class, 'similars', 'parent_id', 'reference_id');
    }

    public function likers()
    {
        return $this->hasManyThrough(
            User::class,
            Like::class,
            'likeable_id',
            'id',
            'id',
            'user_id'
        )->where('likeable_type', News::class)
            ->groupBy('likes.user_id', 'users.id', 'likes.likeable_id');
    }
}
