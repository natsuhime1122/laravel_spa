<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresetCreateRequest extends FormRequest
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
            'preset_name' => 'required|max:256',
        ];
    }

    public function attributes()
    {
        return [
            'preset_name' => 'プリセット名'
        ];
    }
}
