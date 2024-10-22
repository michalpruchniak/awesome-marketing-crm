<?php

namespace Modules\Activities\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Activities\Http\Requests\ActivityRequest;
use Modules\Activities\Services\ActivityService;
use Modules\Customers\Services\CustomersService;
use Modules\Histories\Services\HistoriesService;

class ActivityController extends Controller
{
    private $activityService;
    private $customersService;
    private $historiesService;

    public function __construct(
        ActivityService $activityService,
        CustomersService $customersService,
        HistoriesService $historiesService
    ) {
        $this->activityService = $activityService;
        $this->customersService = $customersService;
        $this->historiesService = $historiesService;
    }

    public function index(int $id)
    {
        $customer = $this->customersService->getOne($id);

        return view('activities::list')
            ->with('mainTitle', 'List of Activities for customer ' . $customer->name)
            ->with('headerTitle', 'List of Activities | ' . $customer->name)
            ->with('activities', $this->activityService->getAll($id));
    }


  public function store(ActivityRequest $request):RedirectResponse {
    $activity = $this->activityService->store($request);

    $this->historiesService->store(Auth::id(), $request->customer, "User " . Auth::user()->name . "was added new activity " . $activity->description);

    return redirect()->back();
  }
}
