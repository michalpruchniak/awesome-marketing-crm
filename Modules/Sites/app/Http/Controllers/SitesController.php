<?php

namespace Modules\Sites\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Customers\Services\CustomersService;
use Modules\Sites\Services\SitesService;

class SitesController extends Controller
{
    private $sitesService;

    public function __construct(
        SitesService $sitesService
    ) {
        $this->sitesService = $sitesService;
    }

    public function store(Request $request)
    {
        $this->sitesService->store($request);

        return redirect()->back();
    }
}
