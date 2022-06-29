<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surnames' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phonenumber' => 'required|integer|max:9999999999',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'paymentmethod' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'surnames.required' => 'Los apellidos son obligatorios',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es válido',
            'phonenumber.required' => 'El teléfono es obligatorio',
            'address.required' => 'La dirección es obligatoria',
            'city.required' => 'La ciudad es obligatoria',
            'province.required' => 'La provincia es obligatoria',
            'postal_code.required' => 'El código postal es obligatorio',
            'country.required' => 'El país es obligatorio',
            'paymentmethod.required' => 'El método de pago es obligatorio',
        ];
    }
}
