<?php

namespace Modules\Reports\Services\Reports\Creators;

use Modules\Customers\Models\Customer;
use Modules\Reports\Services\Reports\Products\TimeActivesForCustomer;
use Modules\Reports\Services\Reports\ReportCreator;

class TimeActivesForCustomerCreator extends ReportCreator
{
    private $customer;

    function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->viewAddress = 'reports::time-activity-for-customer';
    }

    public function generate() {
        $time = app()->makeWith(TimeActivesForCustomer::class, ['customer' => $this->customer]);

        return $time->getData($this->customer);
    }
}
