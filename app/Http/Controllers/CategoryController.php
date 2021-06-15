<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Show categories list.
     *
     * @return View
     */
    public function index(): View
    {
        $service = new CategoryService();
        $categories = $service->getList();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'slug' => 'required',
            'name_ru' => 'required',
            'name_uk' => 'required',
        ]);

        $category = new Category();
        $category->save($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $service = new CategoryService();
        $category = $service->getCategoryBySlug($slug);

        return view('categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param string $slug
     * @return View
     */
    public function edit(string $slug): View
    {
        $service = new CategoryService();
        $category = $service->getCategoryBySlug($slug);

        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  Request  $request
     * @param string $slug
     * @return RedirectResponse
     */
    public function update(Request $request, string $slug): RedirectResponse
    {
        $request->validate([
            'slug' => 'required',
            'name_ru' => 'required',
            'name_uk' => 'required'
        ]);

        $service = new CategoryService();
        $id = $service->updateCategory($request->all(), $slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Category not updated');
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * Archive the specified category.
     *
     * @param string $slug
     * @return RedirectResponse
     */
    public function archive(string $slug): RedirectResponse
    {
        $service = new CategoryService();
        $id = $service->archive($slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Category not archived');
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category archived successfully');
    }

    /**
     * Return from archive specified category.
     *
     * @param string $slug
     * @return RedirectResponse
     */
    public function return(string $slug): RedirectResponse
    {
        $service = new CategoryService();
        $id = $service->returnFromArchive($slug);

        if(!$id) {
            return redirect()->back()->with('error', 'Category not returned from archive');
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category returned from archive successfully');
    }
}
