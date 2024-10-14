<?php

namespace Modules\Activities\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Activities\Services\ActivityService;

class ActivityController extends Controller
{
    private $activityService;

    public function __construct(
        ActivityService $activityService
    ) {
        $this->activityService = $activityService;
    }

  public function store(Request $request):RedirectResponse {
    $this->activityService->store($request);

    return redirect()->back();
  }
}
