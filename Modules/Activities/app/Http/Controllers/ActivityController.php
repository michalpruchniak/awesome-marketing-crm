<?php

namespace Modules\Activities\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Activities\Services\ActivityService;
use Modules\Customers\Services\CustomersService;

class ActivityController extends Controller
{
    private $activityService;
    private $customersService;

    public function __construct(
        ActivityService $activityService,
        CustomersService $customersService
    ) {
        $this->activityService = $activityService;
        $this->customersService = $customersService;
    }

    public function index(int $id)
    {
        $customer = $this->customersService->getOne($id);

        return view('activities::list')
            ->with('mainTitle', 'List of Activities for customer ' . $customer->name)
            ->with('headerTitle', 'List of Activities | ' . $customer->name)
            ->with('activities', $this->activityService->getAll($id));
    }


  public function store(Request $request):RedirectResponse {
    $this->activityService->store($request);

    return redirect()->back();
  }
}
