<?php

namespace Modules\Reports\Services;

use Modules\Customers\Models\Customer;
use Modules\Reports\Services\Reports\Creators\TimeActivesForCustomerCreator;

class ReportsService
{
    public function timeActivitiesForCustomer(Customer $customer): TimeActivesForCustomerCreator
    {
        $raport = new TimeActivesForCustomerCreator($customer);

        return $raport;
    }
}
