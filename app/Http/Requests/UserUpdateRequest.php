<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('user') == config('cms.default_user_id') || 
                $this->route('user') == auth()->user()->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|',
            'email' => 'email|required|unique:users,email,' . $this->route("user"),
            'password' => 'required_with:password_confirmed|confirmed',
            'role'     => 'required',
        ];
    }
}
