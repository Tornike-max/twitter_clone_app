<?php

namespace App\Providers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::define('is-author', function (User $user, Idea $idea) {
            return $user->id === $idea->user_id;
        });

        Gate::define('is-admin', function (User $user) {
            return $user->status === 'superadmin' || $user->status === 'admin';
        });

        Gate::define('idea.action', function (User $user, Idea $idea) {
            return $user->status === 'superadmin' || $user->status === 'admin' || $user->id === $idea->user_id;
        });

        Gate::define('authorized', function (User $authUser, User $modelUser) {
            return $authUser->id === $modelUser->id;
        });

        app()->setLocale('es');

        $topUsers = Cache::remember('topUsers', now()->addMinutes(5), function () {
            return User::withCount('ideas')->orderBy('ideas_count', 'desc')->take(5)->get();
        });

        View::share(
            'topUsers',
            $topUsers
        );
    }
}
