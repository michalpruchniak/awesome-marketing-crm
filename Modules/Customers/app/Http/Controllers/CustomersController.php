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
    private $customersService;

    public function __construct(
        UsersRepository $usersRepository,
        CustomersService $customersService
        ){
        $this->usersRepository = $usersRepository;
        $this->customersService = $customersService;
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

}
