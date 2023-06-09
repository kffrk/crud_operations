<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $rules = [
            'club_id' => 'required',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'required',
            'date_of_birth' => 'required',
            'country' => 'required|string|max:255',
            'height' => 'required|integer|between:120,240',
            'foot' => 'required',
            'market_value' => 'required|integer|between:1000000,500000000',
            'status' => 'required',
        ];

        return $rules;
    }
}
