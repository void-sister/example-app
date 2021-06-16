<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{

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

        return redirect()->route('products.show', ['slug' => $slug])
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

        return redirect()->route('categories.show', ['slug' => $slug])
            ->with('success', 'Product returned from archive successfully');
    }
}
