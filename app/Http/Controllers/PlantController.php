<?php

namespace App\Http\Controllers;

use App\Http\Services\PlantService;
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
            'slug' => 'required|unique:plants|max:255',
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
     * @return View
     */
    public function edit(Plant $plant): View
    {
        return view('plants.edit', compact(['plant']));
    }

    /**
     * Update the specified plant in storage.
     *
     * @param Request $request
     * @param Plant $plant
     * @return RedirectResponse
     */
    public function update(Request $request, Plant $plant): RedirectResponse
    {
        if (!$request->user()->can('edit-plants')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $request->validate([
            'slug' => 'required|unique:plants|max:255',
            'name_ru' => 'required|string|max:255',
            'indoor_light' => 'required|integer',
            'outdoor_light' => 'required|integer',
            'difficulty' => 'required|integer',
            'height' => 'required|integer|min:1',
            'size' => 'required|integer',
        ]);

        $service = new PlantService();
        $updatedPlant = $service->updatePlant($request->except('_method', '_token'), $plant);

        if(!$updatedPlant) {
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

    /**
     * Delete the specified plant in storage.
     *
     * @param Request $request
     * @param Plant $plant
     * @return RedirectResponse
     */
    public function destroy(Request $request, Plant $plant): RedirectResponse
    {
        if (!$request->user()->can('delete-plants')) {
            return redirect()->back()->with('error', 'You are not authorized to do this task');
        }

        $service = new PlantService();
        $deletedPlant = $service->deletePlant($plant);

        if(!$deletedPlant) {
            return redirect()->back()->with('error', 'Plant not deleted');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant deleted successfully');

    }

    /**
     * Add to cart specified plant.
     *
     * @param string $slug
     * @param int $qty
     * @return RedirectResponse
     */
    public function addToCart(string $slug, int $qty = 1): RedirectResponse
    {
        $service = new PlantService();
        $cart = $service->addToCart($slug, $qty); //true

        if(!$cart) {
            return redirect()->back()->with('error', 'Plant not added to cart');
        }

        return redirect()->back()->with('success', 'Plant added to cart successfully!');
    }
}
