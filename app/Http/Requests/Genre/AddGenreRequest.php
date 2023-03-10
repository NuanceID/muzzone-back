<?php

namespace App\Http\Requests\Genre;

use Illuminate\Foundation\Http\FormRequest;

class AddGenreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'genre_id' => 'nullable|exists:genres,id'
        ];
    }
}
