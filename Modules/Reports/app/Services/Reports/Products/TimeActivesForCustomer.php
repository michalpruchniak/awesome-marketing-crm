<?php

namespace Modules\Reports\Services\Reports\Products;

use Modules\Activities\Services\ActivityService;
use Modules\Customers\Models\Customer;

class TimeActivesForCustomer
{
    private $activityService;
    private $customer;

    public function __construct(
        Customer $customer,
        ActivityService $activityService
    )
    {
        $this->activityService = $activityService;
        $this->customer = $customer;
    }

    public function getData() {
        return $this->activityService->getForCustomerPage($this->customer->id);
    }
}
