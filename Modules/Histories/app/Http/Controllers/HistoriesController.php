<?php

namespace Modules\Histories\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Modules\Customers\Repositories\CustomersRepository;
use Modules\Histories\Services\HistoriesService;

class HistoriesController extends Controller
{
    private $customersRepository;

    private $historiesService;

    public function __construct(
        CustomersRepository $customersRepository,
        HistoriesService $historiesService
    ) {
        $this->customersRepository = $customersRepository;
        $this->historiesService = $historiesService;
    }

    public function show(int $id): View
    {
        $customer = $this->customersRepository->getOne($id);
        $histories = $this->historiesService->getForCustomer($id);

        return view('histories::show')
            ->with('mainTitle', 'Histories of '.$customer->name)
            ->with('headerTitle', 'Histories: '.$customer->name)
            ->with('histories', $histories);
    }
}
