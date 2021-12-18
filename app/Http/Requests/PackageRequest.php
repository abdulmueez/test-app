<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'description' => 'required|max:220',
            'commitment_period' => 'required|integer',
            'credits' => 'required|integer',
            'sell_limit' => 'required|integer',
            'enabled' => 'required|in:1,0',
        ];
    }
}
