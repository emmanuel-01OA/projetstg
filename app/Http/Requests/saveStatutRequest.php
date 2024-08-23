<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveStatutRequest extends FormRequest
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


            'type_statut' => 'required|unique:tblstentrp,type_statut'
        ];

    }


    public function message(){

        return [ 'name.unique'=='le nom du statut existe deja' ];

    }
}
