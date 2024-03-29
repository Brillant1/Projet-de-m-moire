<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlashInfoRequest extends FormRequest
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
            'date_debut' => 'bail|required|before_or_equal:date_fin',
            'date_fin' => 'bail|required|after_or_equal:date_debut',
            'contenu' => 'bail|required',
        ];
    }
}
