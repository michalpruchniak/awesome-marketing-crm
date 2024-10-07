<?php

namespace Modules\Histories\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Customers\Models\Customer;
use Modules\Histories\Models\History;

class HistoriesRepository
{
    public function getForCustomer(int $id):Collection {
        $customer = Customer::findOrFail($id);
        $histories = $customer->histories;

        return $histories;
    }

    public function store(int $user_id=null, int $customer_id, string $message):History {
        $history = History::create([
                'user_id' => $user_id,
                'customer_id' => $customer_id,
                'message' => $message
            ]);

        return $history;
    }
}
