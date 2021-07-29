<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class Comment extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->ip_address = Request::getClientIp(); # Ip adress
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    protected $fillable = ['body'];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {

        return 'string';
    }

    /**
     * Get the parent commentable model (user or post).
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function scopeParent(Builder $builder)
    {
        return $builder->whereNull('parent_id');
    }

    public function isParent()
    {
        return is_null($this->parent_id);
    }

    public function likes()
    {
        return $this->morpMany(Like::class, 'likeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->oldest();
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
        )->where('likeable_typ', Comment::class)
            ->groupBy('likes.user_id', 'users.id', 'likes.likeable_id');
    }
}
