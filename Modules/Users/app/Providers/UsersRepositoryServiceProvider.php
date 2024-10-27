<?php

namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Users\Repositories\UsersRepository;
use Modules\Users\Services\LoginService;
use Modules\Users\Services\UsersService;

class UsersRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UsersRepository::class);
        $this->app->bind(UsersService::class);
        $this->app->bind(LoginService::class);
    }
}
