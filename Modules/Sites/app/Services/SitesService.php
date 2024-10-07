<?php

namespace Modules\Sites\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Histories\Services\HistoriesService;
use Modules\Sites\Models\Site;
use Modules\Sites\Repositories\SitesRepository;

class SitesService
{
    private $sitesRepository;
    private $historiesService;

    public function __construct(
        SitesRepository $sitesRepository,
        HistoriesService $historiesService
    ) {
        $this->sitesRepository = $sitesRepository;
        $this->historiesService = $historiesService;
    }

    public function store(Request $request):Site {
        $site = $this->sitesRepository->store($request);
        $this->historiesService->store(Auth::id(), $request->customer, "New site: " . $request->url . " was added by " . Auth::user()->name);

        return $site;
    }

    public function getAllForCustomer(int $id):Collection {
        $sites = $this->sitesRepository->getAllForCustomer($id);

        return $sites;
    }
}
