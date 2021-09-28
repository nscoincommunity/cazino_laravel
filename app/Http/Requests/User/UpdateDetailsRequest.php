<?php

namespace VanguardDK\Http\Requests\User;

use VanguardDK\Http\Requests\Request;
use VanguardDK\User;

class UpdateDetailsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'birthday' => 'nullable|date',
            'role_id' => 'required|exists:roles,id'
        ];
    }
}
