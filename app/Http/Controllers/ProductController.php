<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show products list.
     *
     * @return View
     */
    public function index(): View
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
//            'SKU' => 'required|unique:products|max:20',
            'slug' => 'required',
            'product_name' => 'required',
            'height' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'integer',
            'units_in_stock' => 'integer',
            'units_on_order' => 'integer',
//            'product_available' => 'boolean',
//            'discount_available' => 'boolean',
        ]);

        $service = new ProductService();
        $created = $service->createProduct($request->all());

        if(!$created) {
            return redirect()->back()->with('error', 'Product not created');
        }

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $service = new ProductService();
        $product = $service->getProductBySlug($slug);

        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param string $slug
     * @return View
     */
    public function edit(string $slug): View
    {
        $service = new ProductService();
        $product = $service->getProductBySlug($slug);

        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param string $slug
     * @return RedirectResponse
     */
    public function update(Request $request, string $slug): RedirectResponse
    {
        $request->validate([
//            'SKU' => 'required|unique:products|max:20',
            'slug' => 'required',
            'product_name' => 'required',
            'height' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'integer',
            'units_in_stock' => 'integer',
            'units_on_order' => 'integer',
//            'product_available' => 'boolean',
//            'discount_available' => 'boolean',
        ]);

        $service = new ProductService();
        $id = $service->updateProduct($request->all(), $slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Product not updated');
        }

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Archive the specified product.
     *
     * @param string $slug
     * @return RedirectResponse
     */
    public function archive(string $slug): RedirectResponse
    {
        $service = new ProductService();
        $id = $service->archive($slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Product not archived');
        }

        return redirect()->route('products.index')
            ->with('success', 'Product archived successfully');
    }

    /**
     * Return from archive specified product.
     *
     * @param string $slug
     * @return RedirectResponse
     */
    public function return(string $slug): RedirectResponse
    {
        $service = new ProductService();
        $id = $service->returnFromArchive($slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Product not returned from archive');
        }

        return redirect()->route('products.index')
            ->with('success', 'Product returned from archive successfully');
    }
}
