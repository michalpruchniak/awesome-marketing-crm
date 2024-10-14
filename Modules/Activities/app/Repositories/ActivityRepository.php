<?php

namespace Modules\Activities\Repositories;

use Illuminate\Http\Request;
use Modules\Activities\Models\Activity;

class ActivityRepository
{

    public function store(Request $request):Activity {
        $activity = Activity::create([
            'activity_type_id' => $request->type,
            'description' => $request->description,
            'duration' => $request->duration
        ]);

        return $activity;
    }
}
