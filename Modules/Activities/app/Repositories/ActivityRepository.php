<?php

namespace Modules\Activities\Repositories;

use App\Enums\OrderByType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Activities\DTO\GetAllActivitiesArgsDTO;
use Modules\Activities\Models\Activity;
use Modules\Customers\Models\Customer;

class ActivityRepository
{

    public function getAll(?GetAllActivitiesArgsDTO $args):Collection {
        $activity = Activity::query();

        if($args->getCustomerId()) {
            $activity->where('customer_id', $args->getCustomerId());
        }

        if($args->getUserId()) {
            $activity->where('user_id', $args->getUserId());
        }

        if($args->getOrderBy()) {
            $activity->orderBy('created_at', $args->getOrderBy());
        }

        if($args->getLimit() && !$args->getPaginate()) {
            $activity->limit($args->getLimit());
        }

        if($args->getPaginate()) {
            $activity->limit($args->getPaginate());
        }

        return $activity->get();
    }

    public function store(Request $request):Activity {
        $activity = Activity::create([
            'user_id' => Auth::id(),
            'customer_id' => $request->customer,
            'activity_type_id' => $request->type,
            'description' => $request->description,
            'duration' => $request->duration
        ]);
        return $activity;
    }
}
