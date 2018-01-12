<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
       
        $rules = [
            'title'        => 'required',
            'slug'         => 'required|unique:posts',
            'excerpt'      => 'required|max:1000',
            'body'         => 'required',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
            'category_id'  => 'required',
            'image'        => 'mimes:jpg,jpeg,png,bmp'
        ];


        switch($this->method()){
            case 'PUT':
            case 'PATCH':
                $rules['slug'] = 'required|unique:posts,slug,' . $this->route('post');
                break;
        }

        return $rules;
        

        if (empty($request->published_at)) {
            unset($rules['published_at']);
        }
        $this->validate($request, $rules);
    }    
        
}
