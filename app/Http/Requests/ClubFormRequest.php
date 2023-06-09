<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubFormRequest extends FormRequest
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
            'league_id' => 'required',
            'name' => 'required|string|max:255',
            'status' => 'required',
        ];

        return $rules;
    }
}