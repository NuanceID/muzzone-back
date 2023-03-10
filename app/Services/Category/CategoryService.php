<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

final class CategoryService
{
    public function __construct(private Category $model)
    {
    }

    public function list(): LengthAwarePaginator
    {
        return $this
            ->model
            ->filter()
            ->withCount('tracks')
            ->paginate();
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function store(AddCategoryRequest $request): Category
    {
        $Category = $this->model->create($request->validated());

        if ($request->has('cover')) {
            $Category
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $Category;
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function update(UpdateCategoryRequest $request, Category $category): Category
    {
        $category = tap($category)->update($request->validated());

        if ($request->has('cover')) {
            $category
                ->clearMediaCollection('cover')
                ->addMediaFromRequest('cover')
                ->toMediaCollection('cover');
        }

        return $category;
    }

    public function delete(Category $category, bool $force = false): void
    {
        if ($force) {
            $category->forceDelete();
        }

        $category->delete();
    }
}
