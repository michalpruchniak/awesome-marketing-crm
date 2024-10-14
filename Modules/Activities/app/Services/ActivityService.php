<?php

namespace Modules\Activities\Services;

use Illuminate\Http\Request;
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
}
