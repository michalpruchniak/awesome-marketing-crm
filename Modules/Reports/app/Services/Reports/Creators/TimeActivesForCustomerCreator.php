<?php

namespace Modules\Reports\Services\Reports\Creators;

use Illuminate\Database\Eloquent\Collection;
use Modules\Customers\Models\Customer;
use Modules\Reports\Services\Reports\Interfaces\ReportConcreteCreatorInterface;
use Modules\Reports\Services\Reports\Products\TimeActivesForCustomer;
use Modules\Reports\Services\Reports\ReportCreator;

class TimeActivesForCustomerCreator extends ReportCreator implements ReportConcreteCreatorInterface
{
    public function __construct(Customer $customer)
    {
        $this->viewAddress = 'reports::time-activity-for-customer';
        $this->customer = $customer;
    }

    public function generate(Customer $customer): Collection
    {
        $this->customer = $customer;
        $activities = app()->makeWith(TimeActivesForCustomer::class, ['customer' => $this->customer]);

        return $activities->getData($this->customer);
    }
}
