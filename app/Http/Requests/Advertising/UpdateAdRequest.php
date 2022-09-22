<?php

namespace App\Http\Requests\Advertising;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdRequest extends FormRequest
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
        return [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'type' => 'nullable|string|in:free,paid',
            'start_date' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'advertiser_id' => 'nullable|exists:advertisers,id',
        ];
    }
}
