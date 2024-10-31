<?php

namespace Modules\Activities\Observers;

use Illuminate\Support\Facades\Cache;
use Modules\Activities\Models\Activity;

class ActivityObserver
{
    /**
     * Handle the Activity "created" event.
     */

    public function created(Activity $activity): void
    {
        $cacheKey = 'activity_stats_for_customer_' . $activity->customer_id;
        Cache::forget($cacheKey);
    }

    /**
     * Handle the Activity "updated" event.
     */
    public function updated(Activity $activity): void
    {
        $cacheKey = 'activity_stats_for_customer_' . $activity->customer_id;
        Cache::forget($cacheKey);
    }

    /**
     * Handle the Activity "deleted" event.
     */
    public function deleted(Activity $activity): void
    {
        $cacheKey = 'activity_stats_for_customer_' . $activity->customer_id;
        Cache::forget($cacheKey);
    }

    /**
     * Handle the Activity "restored" event.
     */
    public function restored(Activity $activity): void
    {
        $cacheKey = 'activity_stats_for_customer_' . $activity->customer_id;
        Cache::forget($cacheKey);
    }

    /**
     * Handle the Activity "force deleted" event.
     */
    public function forceDeleted(Activity $activity): void
    {
        $cacheKey = 'activity_stats_for_customer_' . $activity->customer_id;
        Cache::forget($cacheKey);
    }
}
