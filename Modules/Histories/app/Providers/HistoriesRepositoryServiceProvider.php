<?php
namespace Modules\Customers\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Histories\Repositories\HistoriesRepository;

class CustomersRepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(HistoriesRepository::class);
    }
}
