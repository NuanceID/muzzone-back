<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTrackRequest extends FormRequest
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
            'cover' => 'required',
            'file' => 'required',
            'artists_ids' => 'required|exists:artists,id',
            'genres_ids' => 'required|exists:genres,id',
            'album_id' => 'required|exists:albums,id',
            'categories_ids' => 'required|exists:categories,id',
        ];
    }
}
