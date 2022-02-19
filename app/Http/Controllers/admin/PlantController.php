<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\{
    PlantService,
    ProductService
};
use App\Models\Plant;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PlantController extends Controller
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
    public function index(): View
    {
        $service = new PlantService();
        $plants = $service->getList();

        return view('plants.index', compact(['plants']));
    }

    /**
     * Show the form for creating a new plant.
     *
     * @return View
     */
    public function create(): View
    {
        return view('plants.create');
    }

    /**
     * Store a newly created plant in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if (!$request->user()->can('create-plants')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $request->validate([
            'slug' => 'required|unique:plants|max:255|alpha_dash',
            'name_ru' => 'required|string|max:255',
            'indoor_light' => 'required|integer',
            'outdoor_light' => 'required|integer',
            'difficulty' => 'required|integer',
            'height' => 'required|integer|min:1',
            'size' => 'required|integer',
        ]);

        $service = new PlantService();
        $createdPlant = $service->createPlant($request->except('_token'));

        if(!$createdPlant) {
            return redirect()->back()->with('error', 'Plant not created');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant created successfully.');
    }

    /**
     * Display the specified plant.
     *
     * @param Plant $plant
     * @return View
     */
    public function show(Plant $plant): View
    {
        return view('plants.show', compact(['plant']));
    }

    /**
     * Show the form for editing the specified plant.
     *
     * @param Plant $plant
     * @param int $product
     * @return View
     */
    public function edit(Plant $plant, int $product): View
    {
        $service = new ProductService();
        $translations = $service->getProductTranslations($product);

        return view('plants.edit', compact(['plant', 'translations', 'product']));
    }

    /**
     * Update the specified plant in storage.
     *
     * @param Request $request
     * @param Plant $plant
     * @param int $product
     * @return RedirectResponse
     */
    public function update(Request $request, Plant $plant, int $product): RedirectResponse
    {
        if (!$request->user()->can('edit-plants')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $request->validate([
            'slug' => "required|unique:plants,slug,{$plant->id}|max:255|alpha_dash",
            'name_ru' => 'required|string|max:255',
            'name_uk' => 'required|string|max:255',
            'description_uk' => 'required|string|max:255',
            'description_ru' => 'required|string|max:255',
            'indoor_light' => 'required|integer',
            'difficulty' => 'required|integer',
            'height' => 'required|integer|min:1',
            'size' => 'required|integer',
        ]);

        $data = $request->except('_method', '_token');

        $plantService = new PlantService();
        $updatedPlant = $plantService->updatePlant($data, $plant);

        $productService = new ProductService();
        $updatedProduct = $productService->updateTranslations($data, $product);

        if(!$updatedPlant || !$updatedProduct) {
            return redirect()->back()->with('error', 'Plant not updated');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant updated successfully');
    }

    /**
     * Archive the specified plant.
     *
     * @param Request $request
     * @param Plant $plant
     * @return RedirectResponse
     */
    public function archive(Request $request, Plant $plant): RedirectResponse
    {
        if (!$request->user()->can('archive-plants')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new PlantService();
        $archivedPlant = $service->archive($plant);

        if(!$archivedPlant) {
            return redirect()->back()->with('error', 'Plant not archived');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant archived successfully');
    }

    /**
     * Return from archive specified plant.
     *
     * @param Request $request
     * @param Plant $plant
     * @return RedirectResponse
     */
    public function return(Request $request, Plant $plant): RedirectResponse
    {
        if (!$request->user()->can('return-plants')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new PlantService();
        $id = $service->returnFromArchive($plant);

        if(!$id) {
            return redirect()->back()->with('error', 'Plant not returned from archive');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant returned from archive successfully');
    }
}
