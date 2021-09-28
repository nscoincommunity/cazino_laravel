<?php

namespace VanguardDK\Http\Requests\Role;

use VanguardDK\Http\Requests\Request;

class CreateRoleRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,slug'
        ];
    }
}
