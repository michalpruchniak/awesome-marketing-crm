<?php

namespace Modules\Customers\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Models\Customer;

class CustomersRepository
{
    public function getOne($id): Customer
    {
        $customer = Customer::findOrFail($id);

        return $customer;
    }

    public function getAllWithPagination(int $perPage, Request $request): LengthAwarePaginator
    {
        $customers = Customer::query();

        if ($request->input('name') !== null) {
            $customers->where('name', 'like', '%'.$request->input('name').'%'.'%');
        }

        if ($request->input('manager') !== null) {
            $customers->where('user_id', $request->input('manager'));
        }

        if ($request->input('active') === '1') {
            $customers->where('active', 1);
        }

        return $customers->paginate($perPage);
    }

    public function store(CustomerRequest $request): Customer
    {
        $customer = Customer::create([
            'name' => $request->name,
            'user_id' => $request->user,
            'lead' => $request->lead,
            'active' => $request->active,
        ]);

        return $customer;
    }

    public function update(int $id, CustomerRequest $request): Customer
    {
        $customer = $this->getOne($id);
        $customer->name = $request->name;
        $customer->user_id = $request->user;
        $customer->active = $request->active;
        $customer->lead = $request->lead;

        $customer->save();

        return $customer;
    }
}
