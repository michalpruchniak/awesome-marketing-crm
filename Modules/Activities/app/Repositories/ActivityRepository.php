<?php

namespace Modules\Activities\Repositories;

use DateTime;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Activities\DTO\GetAllActivitiesArgsDTO;
use Modules\Activities\Models\Activity;
use Illuminate\Support\Facades\Cache;


class ActivityRepository
{
    public function getAll(?GetAllActivitiesArgsDTO $args): Collection|LengthAwarePaginator
    {
        $activity = Activity::query();

        if ($args->getCustomerId()) {
            $activity->where('customer_id', $args->getCustomerId());
        }

        if ($args->getUserId()) {
            $activity->where('user_id', $args->getUserId());
        }

        if ($args->getOrderBy()) {
            $activity->orderBy('created_at', $args->getOrderBy());
        }

        if ($args->getPaginate()) {
            return $activity->paginate($args->getPaginate());
        }

        if ($args->getLimit() && ! $args->getPaginate()) {
            $activity->limit($args->getLimit());
        }

        return $activity->get();
    }

    public function store(Request $request): Activity
    {
        $activity = Activity::create([
            'user_id' => Auth::id(),
            'customer_id' => $request->customer,
            'activity_type_id' => $request->type,
            'description' => $request->description,
            'duration' => $request->duration,
        ]);

        return $activity;
    }

    public function ActivityStatsForCustomerPage(int $id, DateTime $from, DateTime $to)
    {
        $stats = Activity::where('customer_id', $id)
            ->whereBetween('created_at', [$from, $to])
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) as total_duration")
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();

        return $stats;
    }
}
