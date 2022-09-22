<?php

namespace App\Http\Requests\Advertising;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['name'] = 'nullable|string';
        }

        return $rules;
    }
}
