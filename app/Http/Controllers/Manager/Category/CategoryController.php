<?php

namespace App\Http\Controllers\Manager\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        return view('manager.pages.category.list', [
            'categories' => $this->categoryService->list(),
        ]);
    }

    public function create()
    {
        return view('manager.pages.category.create');
    }

    public function store(AddCategoryRequest $request)
    {
        $category = $this
            ->categoryService
            ->store($request);

        return redirect()
            ->route('manager.categories.index')
            ->with(['message' => "Категория $category->name успешно добавлена"]);
    }

    public function edit(Category $category)
    {
        return view('manager.pages.category.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = $this
            ->categoryService
            ->update($request, $category);

        return redirect()
            ->route('manager.genres.index')
            ->with(['message' => "Категория $category->name успешно обновлена"]);
    }

    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);

        return back()->with([
            'message' => "Категория $category->name удалена"
        ]);
    }
}
