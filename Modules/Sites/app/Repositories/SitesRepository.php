<?php

namespace Modules\Sites\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Customers\Models\Customer;
use Modules\Sites\Http\Requests\SiteRequest;
use Modules\Sites\Models\Site;

class SitesRepository
{
    public function store(SiteRequest $request):Site {
        $site = Site::create([
            'customer_id' => (int)$request->customer,
            'url' => $request->url,
        ]);

        return $site;
    }

    public function getAllForCustomer(Int $id):Collection {
        $customer = Customer::findOrFail($id);
        $sites = $customer->sites;

        return $sites;
    }
}
