<?php

namespace Modules\Histories\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Modules\Customers\Repositories\CustomersRepository;
use Modules\Histories\Repositories\HistoriesRepository;

class HistoriesController extends Controller
{
    private $historiesRepository;
    private $customersRepository;

    public function __construct(
        HistoriesRepository $historiesRepository,
        CustomersRepository $customersRepository,
    ){
        $this->historiesRepository = $historiesRepository;
        $this->customersRepository = $customersRepository;
    }

    public function show(int $id) {
        $customer = $this->customersRepository->getOne($id);
        $histories = $this->historiesRepository->show($id);

        return view('histories::show')
                ->with('mainTitle', 'Histories of ' . $customer->name)
                ->with('headerTitle', 'Histories: ' . $customer->name)
                ->with('histories', $histories);
        }
    }
