<?php

namespace VanguardDK\Http\Requests\User;

use VanguardDK\Http\Requests\Request;
use VanguardDK\User;

class UpdateProfilePasswordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed|different:old_password',
			'password_confirmation' => 'required|min:8',
        ];
    }
}
