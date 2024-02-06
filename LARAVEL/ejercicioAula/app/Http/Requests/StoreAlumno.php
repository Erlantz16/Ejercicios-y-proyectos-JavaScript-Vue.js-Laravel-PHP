<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumno extends FormRequest
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
            "nombre_apellido" => "required|min:5|max:75",
            "edad" => "required|integer",
            "telefono" => "required|max:35",
            "direccion" => "max:75",
            "foto" => "image"
        ];
    }

    public function messages()
    {
        return [
            "nombre_apellido.required" => "Izena eta abizenak derrigorrezkoak dira",
            "nombre_apellido.min" => "Izen abizenak gutxienez 5 karaketere izan behar ditu",
            "nombre_apellido.max" => "Izen abizenak gehienez 75 karaketere izan behar ditu",
            "edad.required" => "Adina derrigorrezkoa da",
            "edad.integer" => "Adina zenbaki bat izan behar da",
            "telefono.max" => "Telefonoak gehienez 35 karaketere izan behar ditu",
            "direccion.max" => "Helbidea gehienez 75 karaketere izan behar ditu"
        ];
    }
}