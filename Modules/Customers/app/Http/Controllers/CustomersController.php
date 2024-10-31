<?php

namespace Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Activities\Services\ActivityService;
use Modules\Activities\Services\ActivityTypeService;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Services\CustomersService;
use Modules\Histories\Services\HistoriesService;
use Modules\Reports\Services\ReportsService;
use Modules\Users\Services\UsersService;

class CustomersController extends Controller
{
    private $usersService;

    private $customersService;

    private $historiesService;

    private $activityService;

    private $activityTypeService;

    private $reportService;

    private $users;

    public function __construct(
        UsersService $usersService,
        CustomersService $customersService,
        HistoriesService $historiesService,
        ActivityService $activityService,
        ActivityTypeService $activityTypeService,
        ReportsService $reportService
    ) {
        $this->usersService = $usersService;
        $this->customersService = $customersService;
        $this->historiesService = $historiesService;
        $this->activityService = $activityService;
        $this->activityTypeService = $activityTypeService;
        $this->reportService = $reportService;
        $this->users = $this->usersService->getAll();
    }

    public function index(Request $request): View
    {
        $customers = $this->customersService->getAllWithPagination(15, $request);

        return view('customers::list')
            ->with('mainTitle', 'List of customers')
            ->with('headerTitle', 'List of customers')
            ->with('users', $this->users)
            ->with('customers', $customers);
    }

    public function show($id): View
    {
        $customer = $this->customersService->getOne($id);
        $activities = $this->activityService->getForCustomerPage($id);
        $activitiesType = $this->activityTypeService->getAll();
        $activitiesRaport = $this->reportService->timeActivitiesForCustomer($customer);

        return view('customers::show')
            ->with('mainTitle', 'Show and modify customer '.$customer->name)
            ->with('headerTitle', 'Customer: '.$customer->name)
            ->with('customer', $customer)
            ->with('activitiesType', $activitiesType)
            ->with('activities', $activities)
            ->with('activitiesRaport', $activitiesRaport->view());
    }

    public function create(): View
    {
        return view('customers::create')
            ->with('headerTitle', 'Create new customer')
            ->with('users', $this->users);
    }

    public function store(CustomerRequest $request): RedirectResponse
    {
        $customer = $this->customersService->store($request);
        $message = 'User '.$customer->user->name.' was added customer '.$customer->name;
        $this->historiesService->store(Auth::id(), $customer->id, $message);

        return redirect()->route('customers.show', ['id' => $customer->id]);
    }

    public function edit($id): View
    {
        $customer = $this->customersService->getOne($id);

        return view('customers::create')
            ->with('customer', $customer)
            ->with('headerTitle', 'Edit customer '.$customer->name)
            ->with('mainTitle', 'Edit customer '.$customer->name)
            ->with('users', $this->users);
    }

    public function update($id, CustomerRequest $request): RedirectResponse
    {
        $customer = $this->customersService->update($id, $request);

        $message = 'User '.$customer->user->name.' was updated customer '.$customer->name;
        $this->historiesService->store(Auth::id(), $customer->id, $message);

        return redirect()->route('customers.show', ['id' => $customer->id]);
    }
}
