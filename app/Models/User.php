<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\NewUserRegistred;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'nickname',
        'password',
    ];

    protected static function boot(){
        parent::boot();

        static::created(function($model){
            // Notify admin of new user registration
            $user = User::find(1);
            $user->notify(new NewUserRegistred($model));
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
        // return $this->morphMany(Like::class, 'likeable');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function urls()
    {
        return $this->hasMany(Url::class);
    }

    public function avatarUrl()
    {
        return $this->profile_photo_url;
        // return $this->avatar
        //     ? Storage::disk('avatars')->url($this->avatar)
        //     : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
    }

    /**
     *
     */
    public function ip()
    {
        return $this->hasMany(Ip::class);
    }
}
