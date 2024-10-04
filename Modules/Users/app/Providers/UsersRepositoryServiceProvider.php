<?php
namespace Modules\Users\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Users\Repositories\UsersRepository;

class UsersRepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(UsersRepository::class);
    }
}
