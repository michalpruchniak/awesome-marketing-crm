<?php

namespace Modules\Activities\Services;

use App\Enums\OrderByType;
use DateTime;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Activities\DTO\GetAllActivitiesArgsDTO;
use Modules\Activities\Models\Activity;
use Modules\Activities\Repositories\ActivityRepository;

class ActivityService
{
    private $activityRepository;

    public function __construct(
        ActivityRepository $activityRepository
    ) {
        $this->activityRepository = $activityRepository;
    }

    public function store(Request $request): Activity
    {
        $activity = $this->activityRepository->store($request);

        return $activity;
    }

    public function getForCustomerPage(int $id): Collection|LengthAwarePaginator
    {
        $args = new GetAllActivitiesArgsDTO(customerId: $id, limit: 45, orderBy: OrderByType::DESC);

        return $this->activityRepository->getAll($args);
    }

    public function getAll(int $id): Collection|LengthAwarePaginator
    {
        $args = new GetAllActivitiesArgsDTO(customerId: $id, paginate: 55, orderBy: OrderByType::DESC);

        return $this->activityRepository->getAll($args);
    }

    public function activityStatsForCustomerPage(int $id, DateTime $from, dateTime $to): Collection
    {
        $cacheKey = "activity_stats_for_customer_{$id}";

        $activities = Cache::remember($cacheKey, 1440, function () use ($id, $from, $to) {
            return $this->activityRepository->ActivityStatsForCustomerPage($id, $from, $to);
        });

        return $activities;
    }
}
