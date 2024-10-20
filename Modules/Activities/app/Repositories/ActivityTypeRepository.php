<?php

namespace Modules\Activities\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Activities\Models\ActivityType;

class ActivityTypeRepository
{
    public function getAll():Collection {
        $activityType = ActivityType::all();

        return $activityType;
    }
}
