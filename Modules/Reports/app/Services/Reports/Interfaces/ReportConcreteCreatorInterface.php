<?php

namespace Modules\Reports\Services\Reports\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\Customers\Models\Customer;

interface ReportConcreteCreatorInterface {
    public function generate(Customer $customer): Collection;
}
