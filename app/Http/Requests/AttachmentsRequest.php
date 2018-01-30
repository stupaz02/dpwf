<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required'
        ];
        $files = count($this->inputs('file_name'));
        foreach(range(0, $files) as $index)
        {
            $rules['file_name.' . $index] = 'mimes:jpeg,bmp,png|max:2000';
        }

        return $rules;
    }
}
