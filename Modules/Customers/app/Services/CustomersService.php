<?php
namespace Modules\Customers\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Repositories\CustomersRepository;

    class CustomersService{
        private $customersRepository;

        public function __construct(
            CustomersRepository $customersRepository
            ){
                $this->customersRepository = $customersRepository;
            }

        public function createNewCustomer(CustomerRequest $request): void {
            if(!Auth::user()->hasPermissionTo('add user to customer') || !isset($request->user)){
                $request->user = $request->user;
            }

            $customer = $this->customersRepository->storeCustomer($request);
            $this->customersRepository->storeHistoryManager($request->user, $customer->id);
        }
    }
