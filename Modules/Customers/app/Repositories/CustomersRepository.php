<?php
namespace Modules\Customers\Repositories;

use Illuminate\Http\Request;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Models\Customer;
use Modules\Customers\Models\CustomerHistoryManager;

class CustomersRepository {

    public function storeCustomer(CustomerRequest $request): Customer{
        $customer = Customer::create([
            'user_id' => $request->user,
            'name' => $request->name
        ]);

        return $customer;

    }

    public function storeHistoryManager(int $user, int $customer): CustomerHistoryManager{
        $customerHistoryManager = CustomerHistoryManager::create([
            'user_id'=> $user,
            'customer_id'=> $customer
        ]);

        return $customerHistoryManager;
    }
}
