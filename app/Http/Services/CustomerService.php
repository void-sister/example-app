<?php

namespace App\Http\Services;

use App\Models\Customer;

class CustomerService extends BaseService
{
    public function getCustomersList()
    {
        return Customer::paginate(5);
    }
}
