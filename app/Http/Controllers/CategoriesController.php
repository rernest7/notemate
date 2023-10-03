<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::whereIsRoot()
            ->latest()
            ->withCount('notes', 'children')
            ->paginate();

        return view('categories.index', [
            'categories' => $categories,
            'categoriesCount' => $categories->total(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $cat = $this->saveOrAppend(new Category, $request->validated());

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view('categories.show', [
            'category' => $category,
            'nodes' => $category->children()->get(),
            'notes' => $category->notes()->latest()->paginate()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->saveOrAppend($category, $request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    private function saveOrAppend(Category $cat, array $data): Category
    {
        $cat->name = $data['name'];
        $cat->description = $data['description'] ?? null;

        if (isset($data['parent_id']) && $cat->parent_id != $data['parent_id'] && $cat->id != $data['parent_id']) {
            $parent = Category::find($data['parent_id']);
            $parent->appendNode($cat);
        } else {
            $cat->save();
        }

        return $cat;
    }
}
