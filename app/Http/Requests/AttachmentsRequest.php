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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      

        
        // $files = count($this->input('file_name'));
        // foreach(range(0, $files) as $index)
        // {
        //     $rules['file_name.' . $index] = 'required|mimes:jpeg,txt,bmp,png|max:2000';
        // }

        // return $rules;

        return [
           
            'file_name.*' => 'nullable|mimes:jpeg,png,bmp,pdf|max:8000'
                // 'file_name.*' => 'nullable|mimetypes:application/pdf|mimes:jpeg,png,bmp|max:8000'
           
            
        ];

     


    }
}
