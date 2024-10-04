<?php
namespace Modules\Customers\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Models\Customer;
use Modules\Customers\Repositories\CustomersRepository;

    class CustomersService{
        private $customersRepository;

        public function __construct(
            CustomersRepository $customersRepository
            ) {
                $this->customersRepository = $customersRepository;
            }

        public function createNewCustomer(CustomerRequest $request):Customer {
            $request = $this->checkUser($request);
            $customer = $this->customersRepository->storeCustomer($request);

            return $customer;
        }

        public function updateCustomer(int $id, CustomerRequest $request):Customer {
            $request = $this->checkUser($request);
            $customer = $this->customersRepository->updateCustomer($id, $request);

            return $customer;
        }

        private function checkUser(CustomerRequest $request):CustomerRequest {
            if(!Auth::user()->hasPermissionTo('add user to customer') || !isset($request->user)){
                $request->user = $request->user;
            }

            return $request;
        }
    }
