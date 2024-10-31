<?php

namespace Modules\Reports\Services\Reports\Products;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Modules\Activities\Services\ActivityService;
use Modules\Customers\Models\Customer;
use Modules\Reports\Services\Reports\Interfaces\ReportProductInterface;

class TimeActivesForCustomer implements ReportProductInterface
{
    private $activityService;
    private $customer;

    public function __construct(
        Customer $customer,
        ActivityService $activityService
    ) {
        $this->activityService = $activityService;
        $this->customer = $customer;
    }

    public function getData(): Collection
    {
        $from = Carbon::now()->subMonth(6)->startOfMonth();
        $to = Carbon::now()->endOfMonth();

        return $this->activityService->activityStatsForCustomerPage($this->customer->id, $from, $to);
    }
}
