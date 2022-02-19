<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show plants list.
     *
     * @return View
     */
    public function plants(): View
    {
        $service = new ProductService();
        $plants = $service->getPlantsList('ru');

        return view('plants.index', compact(['plants']));
    }

    public function pots(): View
    {

    }
}
