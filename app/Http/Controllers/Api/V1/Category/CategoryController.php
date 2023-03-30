<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Resources\Category\IndexCategoryResource;
use App\Http\Resources\Category\ShowCategoryResource;
use App\Models\Category;
use App\Services\Category\CategoryService;

class CategoryController
{
    public function __construct(private CategoryService $categoryService)
    {
    }

    public function index()
    {
        $categories = $this->categoryService->list();

        return IndexCategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        return ShowCategoryResource::make($category);
    }
}
