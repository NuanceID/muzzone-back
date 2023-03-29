<?php

namespace App\Http\Controllers\Manager\Dictionary;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DictionaryController extends Controller
{
    public function search($dictionary, ?string $search = null): JsonResponse
    {
        if (is_null($search)) {
            return response()->json();
        }

        $model = ucfirst($dictionary);

        $dictionary = app("App\\Models\\$model");

        $data = $dictionary::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->get(['id', 'name']);

        return response()->json($data);
    }
}
