<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required|integer',
            'genres' => 'required|array',
            'genres.*' => 'required|integer|exists:genres,id',
            'countries' => 'required|array',
            'countries.*' => 'required|integer|exists:countries,id',
            'is_free' => 'nullable',
            'status' => 'nullable'
        ];
    }
}
