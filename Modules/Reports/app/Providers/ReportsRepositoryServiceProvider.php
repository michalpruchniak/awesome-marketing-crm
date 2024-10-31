<?php

namespace Modules\Reports\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Reports\Services\Reports\Products\TimeActivesForCustomer;
use Modules\Reports\Services\ReportsService;

class ReportsRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TimeActivesForCustomer::class);
        $this->app->bind(ReportsService::class);
    }
}
