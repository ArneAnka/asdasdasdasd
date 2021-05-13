<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use App\Models\Urls;
use App\Policies\UrlsPolicy;
use App\Models\Comment;
use App\Policies\CommentPolicy;
use App\Models\News;
use App\Policies\NewsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Post' => 'App\Policies\PostPolicy',
        Post::class => PostPolicy::class,
        Urls::class => UrlsPolicy::class,
        Comment::class => CommentPolicy::class,
        News::class => NewsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
