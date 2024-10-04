<?php
namespace Modules\Customers\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Models\Customer;
use Modules\Customers\Models\CustomerHistoryManager;

class CustomersRepository {

    public function getAllWithPagination(int $perPage = 15, Request $request):LengthAwarePaginator {
        $customers = Customer::query();

        if($request->input('name') !== null){
            $customers->where('name', 'like', '%' . $request->input('name') . '%' . '%');
        }

        if($request->input('manager') !== null){
            $customers->where('user_id', $request->input('manager'));
        }

        return $customers->paginate($perPage);
    }


    public function getOne($id):Customer {
        $customer = Customer::findOrFail($id);

        return $customer;
    }

    public function storeCustomer(CustomerRequest $request):Customer {
        $customer = Customer::create([
            'name' => $request->name,
            'user_id' => $request->user
        ]);

        return $customer;
    }

    public function updateCustomer(int $id, CustomerRequest $request):Customer {
        $customer = $this->getOne($id);
        $customer->name = $request->name;
        $customer->user_id = $request->user;

        $customer->save();

        return $customer;
    }

    public function storeHistoryManager(int $user, int $customer):CustomerHistoryManager {
        $customerHistoryManager = CustomerHistoryManager::create([
            'user_id'=> $user,
            'customer_id'=> $customer
        ]);

        return $customerHistoryManager;
    }
}
