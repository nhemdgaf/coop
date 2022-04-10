<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCapitalShareRequest extends FormRequest
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
            "full_name"     => "required|max:70",
            "capital_2021"  => "nullable",
            "jan"           => "nullable",
            "feb"           => "nullable",
            "mar"           => "nullable",
            "apr"           => "nullable",
            "may"           => "nullable",
            "jun"           => "nullable",
            "jul"           => "nullable",
            "aug"           => "nullable",
            "sep"           => "nullable",
            "oct"           => "nullable",
            "nov"           => "nullable",
            "dec"           => "nullable"
        ];
    }
}
