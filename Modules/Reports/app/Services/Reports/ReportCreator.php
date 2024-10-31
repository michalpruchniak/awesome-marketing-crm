<?php

namespace Modules\Reports\Services\Reports;

use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\View;
use Modules\Customers\Models\Customer;

abstract class ReportCreator
{
    protected $viewAddress;

    protected $customer;

    abstract public function generate(Customer $customer): Collection;

    public function json(): string
    {
        return json_encode($this->generate($this->customer));
    }

    public function view(): ViewView
    {
        return View::make($this->viewAddress, ['data' => $this->generate($this->customer)]);
    }
}
