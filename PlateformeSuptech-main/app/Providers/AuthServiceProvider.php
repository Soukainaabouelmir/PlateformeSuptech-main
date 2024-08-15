<?php

namespace App\Providers;
use App\Models\Admin;
use App\Policies\AdminPolicy;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Admin::class => AdminPolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('authUser', Auth::guard('etudient')->user());
        });
        $this->registerPolicies();

        //
    }
}
