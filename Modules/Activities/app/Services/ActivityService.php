<?php

namespace Modules\Activities\Services;

use App\Enums\OrderByType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Modules\Activities\DTO\GetAllActivitiesArgsDTO;
use Modules\Activities\Repositories\ActivityRepository;

class ActivityService
{
    private $activityRepository;

    public function __construct(
        ActivityRepository $activityRepository
    ) {
        $this->activityRepository = $activityRepository;
    }

    public function store(Request $request) {
        $this->activityRepository->store($request);
    }

    public function getForCustomerPage(int $id):Collection|LengthAwarePaginator {
        $args = new GetAllActivitiesArgsDTO(customerId: $id, limit: 45, orderBy:OrderByType::DESC);

        return $this->activityRepository->getAll($args);
    }

    public function getAll(int $id):Collection|LengthAwarePaginator {
        $args = new GetAllActivitiesArgsDTO(customerId: $id, paginate: 55, orderBy:OrderByType::DESC);

        return $this->activityRepository->getAll($args);
    }
}
