<?php

namespace Modules\Reports\Services\Reports\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ReportProductInterface
{
    public function getData(): Collection;
}
