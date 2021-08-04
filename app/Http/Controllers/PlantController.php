<?php

namespace App\Http\Controllers;

use App\Http\Services\PlantService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Show plants list.
     *
     * @return View
     */
    public function index(): View
    {
        $service = new PlantService();
        $plants = $service->getListForAdmin();

        return view('plants.index', [
            'plants' => $plants
        ]);
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
        $created = $service->createPlant($request->all());

        if(!$created) {
            return redirect()->back()->with('error', 'Plant not created');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant created successfully.');
    }

    /**
     * Display the specified plant.
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $service = new PlantService();
        $plant = $service->getPlantBySlug($slug);

        return view('plants.show', [
            'plant' => $plant
        ]);
    }

    /**
     * Show the form for editing the specified plant.
     *
     * @param string $slug
     * @return View
     */
    public function edit(string $slug): View
    {
        $service = new PlantService();
        $plant = $service->getPlantBySlug($slug);

        return view('plants.edit', [
            'plant' => $plant
        ]);
    }

    /**
     * Update the specified plant in storage.
     *
     * @param Request $request
     * @param string $slug
     * @return RedirectResponse
     */
    public function update(Request $request, string $slug): RedirectResponse
    {
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
        $id = $service->updatePlant($request->all(), $slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Plant not updated');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant updated successfully');
    }

    /**
     * Archive the specified plant.
     *
     * @param string $slug
     * @return RedirectResponse
     */
    public function archive(string $slug): RedirectResponse
    {
        $service = new PlantService();
        $id = $service->archive($slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Plant not archived');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant archived successfully');
    }

    /**
     * Return from archive specified plant.
     *
     * @param string $slug
     * @return RedirectResponse
     */
    public function return(string $slug): RedirectResponse
    {
        $service = new PlantService();
        $id = $service->returnFromArchive($slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Plant not returned from archive');
        }

        return redirect()->route('plants.index')
            ->with('success', 'Plant returned from archive successfully');
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
