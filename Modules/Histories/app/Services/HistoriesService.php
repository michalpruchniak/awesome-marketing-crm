<?php

namespace Modules\Histories\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Histories\Models\History;
use Modules\Histories\Repositories\HistoriesRepository;

class HistoriesService
{
    private $historiesRepository;

    public function __construct(
        HistoriesRepository $historiesRepository
    ) {
        $this->historiesRepository = $historiesRepository;
    }

    public function getForCustomer(int $id): Collection
    {
        $histories = $this->historiesRepository->getForCustomer($id);

        return $histories;
    }

    public function store(?int $user_id, int $customer_id, string $message): History
    {
        $history = $this->historiesRepository->store($user_id, $customer_id, $message);

        return $history;
    }
}
