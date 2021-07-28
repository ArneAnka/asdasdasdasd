<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['topic', 'url', 'sticky'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->ip_address = Request::getClientIp();
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

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
        // return $this->hasMany(User::class, 'likeable');
        return $this->morphMany(Like::class, 'likeable');
    }

    public function user()
    {
        // return $this->morphOne(Like::class, 'likeable');
        return $this->belongsTo(User::class);
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
        )->where('likeable_type', Urls::class)
            ->groupBy('likes.user_id', 'users.id', 'likes.likeable_id');
    }
}
