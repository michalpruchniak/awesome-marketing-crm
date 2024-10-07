<?php

namespace Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Services\CustomersService;
use Modules\Histories\Services\HistoriesService;
use Modules\Users\Repositories\UsersRepository;

class CustomersController extends Controller
{

    private $usersRepository;
    private $customersService;
    private $historiesService;
    private $users;

    public function __construct(
        UsersRepository $usersRepository,
        CustomersService $customersService,
        HistoriesService $historiesService
        ){
        $this->usersRepository = $usersRepository;
        $this->customersService = $customersService;
        $this->historiesService = $historiesService;
        $this->users = $this->usersRepository->getAll();
    }

    public function index(Request $request):View {
        $customers = $this->customersService->getAllWithPagination(15, $request);

        return view('customers::list')
                ->with('mainTitle', 'List of customers')
                ->with('headerTitle', 'List of customers')
                ->with('users', $this->users)
                ->with('customers', $customers);
    }

    public function show($id):View {
        $customer = $this->customersService->getOne($id);

        return view('customers::show')
                ->with('mainTitle', 'Show and modify customer ' . $customer->name)
                ->with('headerTitle', 'Customer: ' . $customer->name)
                ->with('customer', $customer);
    }

    public function create():View {
        return view('customers::create')
                ->with('headerTitle', 'Create new customer')
                ->with('users', $this->users);
    }


    public function store(CustomerRequest $request):RedirectResponse {
        $customer = $this->customersService->createNewCustomer($request);

        $message = 'User ' . $customer->user->name . ' was added customer ' . $customer->name;
        $this->historiesService->store(Auth::id(), $customer->id, $message);

        return redirect()->route('customers.show', ['id' => $customer->id]);
    }

    public function edit($id):View {
        $customer = $this->customersService->getOne($id);

        return view('customers::create')
                ->with('customer', $customer)
                ->with('headerTitle', 'Edit customer ' . $customer->name)
                ->with('mainTitle', 'Edit customer ' . $customer->name)
                ->with('users', $this->users);
    }

    public function update($id, CustomerRequest $request):RedirectResponse {
        $customer = $this->customersService->updateCustomer($id, $request);

        $message = 'User ' . $customer->user->name . ' was updated customer ' . $customer->name;
        $this->historiesService->store(Auth::id(), $customer->id, $message);

        return redirect()->route('customers.show', ['id' => $customer->id]);
    }
}
