<?php

namespace Modules\Reports\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Reports\Services\Reports\Products\TimeActivesForCustomer;

class ReportsRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TimeActivesForCustomer::class);
    }
}
