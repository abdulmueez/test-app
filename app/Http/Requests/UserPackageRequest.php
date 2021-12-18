<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPackageRequest extends FormRequest
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
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ];
    }
}
