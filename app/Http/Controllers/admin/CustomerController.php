<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CustomerService;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of customers.
     *
     * @return View
     */
    public function index(): View
    {
        $customerService = new CustomerService();
        $customers = $customerService->getCustomersList();

        return view('customers.index', compact(['customers']));
    }
}
