<?php

namespace App\Http\Controllers\Manager\Dictionary;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class DictionaryController extends Controller
{
    public function search($dictionary, string $search): JsonResponse
    {
        $dictionary = app("App\\Models\\$dictionary");

        $data = $dictionary::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->get(['id', 'name']);

        return response()->json($data);
    }
}
