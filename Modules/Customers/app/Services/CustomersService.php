<?php

namespace Modules\Customers\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Customers\Http\Requests\CustomerRequest;
use Modules\Customers\Models\Customer;
use Modules\Customers\Repositories\CustomersRepository;

class CustomersService
{
    private $customersRepository;

    public function __construct(
        CustomersRepository $customersRepository
    ) {
        $this->customersRepository = $customersRepository;
    }

    public function getOne(int $id): Customer
    {
        return $this->customersRepository->getOne($id);
    }

    public function getAllWithPagination(int $perPage, Request $request): LengthAwarePaginator
    {
        $customers = $this->customersRepository->getAllWithPagination($perPage, $request);

        return $customers;
    }

    public function store(CustomerRequest $request): Customer
    {
        $request = $this->checkUser($request);
        $customer = $this->customersRepository->store($request);

        return $customer;
    }

    public function update(int $id, CustomerRequest $request): Customer
    {
        $request = $this->checkUser($request);
        $customer = $this->customersRepository->update($id, $request);

        return $customer;
    }

    private function checkUser(CustomerRequest $request): CustomerRequest
    {
        if (! Auth::user()->hasPermissionTo('add user to customer') || ! isset($request->user)) {
            $request->user = $request->user;
        }

        return $request;
    }
}
