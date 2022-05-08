<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'=>'required',
            'phone'=>'required|numeric|unique:doctors,phone,'.$this->id,
            'room'=>'required|numeric|unique:doctors,room,'.$this->id,
            'speciality'=>'required',
            'image'=>'required_without:id|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'required_without'=>'the image is required'
        ];
    }
}
