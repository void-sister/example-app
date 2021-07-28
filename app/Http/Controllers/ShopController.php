<?php

namespace App\Http\Controllers;

use App\Models\PlantSearch;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        //TODO validate request

        $searchModel = new PlantSearch();
        $products = $searchModel->search($request->all());

        return view('shop.index', [
            'products' => $products
        ]);
    }
}
