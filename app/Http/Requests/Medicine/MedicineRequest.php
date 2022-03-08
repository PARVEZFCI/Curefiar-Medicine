<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'medicine_name' => 'required|string',
            'dosage' => 'required',
            'category_id' => 'required',
            'primary_unit' => 'required',
            'price' => 'required | numeric',
            'image' => 'required',
        ];
    }
}
