<?php
namespace Modules\Customers\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Histories\Repositories\HistoriesRepository;
use Modules\Histories\Services\HistoriesService;

class CustomersRepositoryServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(HistoriesRepository::class);
        $this->app->bind(HistoriesService::class);
    }
}
