<?php

namespace Modules\Customers\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Repositories\CustomersRepository;
use Modules\Customers\Services\CustomersService;
use Modules\Users\Repositories\UsersRepository;

class CustomersController extends Controller
{

    private $usersRepository;
    private $customersRepository;
    private $customersService;


    public function __construct(
        UsersRepository $usersRepository,
        CustomersService $customersService,
        CustomersRepository $customersRepository
        ){
        $this->usersRepository = $usersRepository;
        $this->customersService = $customersService;
        $this->customersRepository = $customersRepository;
    }

    public function create()
    {
        return view('customers::create')
                ->with('headerTitle', 'Create new customer')
                ->with('users', $this->usersRepository->getAll());
    }


    public function store(CustomerRequest $request)
    {
        $this->customersService->createNewCustomer($request);

        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = $this->customersRepository->getOne($id);

        return view('customers::create')
                ->with('customer', $customer)
                ->with('headerTitle', 'Edit customer ' . $customer->name)
                ->with('mainTitle', 'Edit customer ' . $customer->name)
                ->with('users', $this->usersRepository->getAll());
    }

    public function update($id, CustomerRequest $request){
        $this->customersRepository->updateCustomer($id, $request);
    }

}
