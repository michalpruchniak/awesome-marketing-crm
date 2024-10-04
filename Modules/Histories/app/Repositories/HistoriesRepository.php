<?php

namespace Modules\Histories\Repositories;

use Modules\Histories\Models\History;

class HistoriesRepository
{
    public function store(int $user_id=null, int $customer_id, string $message):void {
        History::create([
            'user_id' => $user_id,
            'customer_id' => $customer_id,
            'message' => $message
        ]);
    }

}
