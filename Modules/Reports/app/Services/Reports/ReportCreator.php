<?php

namespace Modules\Reports\Services\Reports;

use Illuminate\Support\Facades\View;

abstract class ReportCreator
{
    protected $viewAddress;

    abstract public function generate();

    public function json()
    {
        return json_encode($this->generate());
    }

    public function view()
    {
        return View::make($this->viewAddress, ['data' => $this->generate()]);
    }
}
