<?php

namespace App\Http\Requests\Track;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required',
            'bitrate' => 'required|integer',
            'description' => 'required',
            'cover' => 'sometimes',
            'file' => 'so   metimes',
            'artists_ids' => 'required|exists:artists,id',
            'genres_ids' => 'required|exists:genres,id',
            'album_id' => 'required|exists:albums,id',
            'categories_ids' => 'required|exists:categories,id',
        ];
    }
}
