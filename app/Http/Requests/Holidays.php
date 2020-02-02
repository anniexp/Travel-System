<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Holidays extends FormRequest
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
            

            'name' => 'required|max:255',
            'date' => 'required|max:255',
            'duration' => 'required|max:255',
            'typeOfTransport_id' => 'required',
            'organisator_id' => 'required',
            'image_id' => 'required',
        ];
    }
}
