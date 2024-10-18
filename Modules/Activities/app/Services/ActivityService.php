<?php

namespace Modules\Activities\Services;

use App\Enums\OrderByType;
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
        $hours = $request->input('durationh');
        $minutes = $request->input('durationm');

        $totalDuration = ($hours * 60) + $minutes;

        $request->merge([
            'duration' => $totalDuration
        ]);

        $this->activityRepository->store($request);
    }

    public function getForCustomerPage(int $id) {
        $args = new GetAllActivitiesArgsDTO(customerId: $id, limit: 45, orderBy:OrderByType::DESC);

        return $this->activityRepository->getAll($args);
    }
}
