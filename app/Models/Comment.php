<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Undocumented function
     * Skall vi skicka notifieringar här?
     * @return void
     */
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function ($model) {
    //         if (empty($model->{$model->getKeyName()})) {
    //             $model->{$model->getKeyName()} = Str::uuid()->toString();
    //         }
    //     });
    // }

    protected $fillable = ['body'];

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
