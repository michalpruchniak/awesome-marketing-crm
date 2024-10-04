<?php
namespace Modules\Customers\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Customers\Repositories\CustomersRepository;
use Modules\Customers\Services\CustomersService;

class CustomersRepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(CustomersRepository::class);
        $this->app->bind(CustomersService::class);
    }
}
