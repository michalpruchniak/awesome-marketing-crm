<?php

namespace Modules\Sites\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Sites\Http\Requests\SiteRequest;
use Modules\Sites\Services\SitesService;

class SitesController extends Controller
{
    private $sitesService;

    public function __construct(
        SitesService $sitesService
    ) {
        $this->sitesService = $sitesService;
    }

    public function store(SiteRequest $request): RedirectResponse
    {
        $this->sitesService->store($request);

        return redirect()->back();
    }
}
