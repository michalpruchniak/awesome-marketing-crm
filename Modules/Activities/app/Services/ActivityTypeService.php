<?php

namespace Modules\Activities\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Activities\Repositories\ActivityTypeRepository;

class ActivityTypeService
{
    private $activityTypeRepository;

    public function __construct(
        ActivityTypeRepository $activityTypeRepository
    ) {
        $this->activityTypeRepository = $activityTypeRepository;
    }
        public function getAll():Collection {
            $activityType = $this->activityTypeRepository->getAll();

            return $activityType;
        }
}
