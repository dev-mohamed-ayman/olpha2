<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nationality' => 'required',
            'origin' => 'required',
            'country' => 'required',
            'city' => 'required',
            'status' => 'required',
            'searching_for' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'skin_colour' => 'required',
            'physique' => 'required',
            'religion' => 'required',
            'religion_commitment' => 'required',
            'prayer' => 'required',
            'smoking' => 'required',
            'beard' => 'required',
            'educational_qualification' => 'required',
            'financial_status' => 'required',
            'employment' => 'required',
            'job' => 'required',
            'monthly_income' => 'required',
            'health_status' => 'required',
            'specifications_of_your_life_partner' => 'required',
            'talk_about_your_self' => 'required',
        ];
    }
}
