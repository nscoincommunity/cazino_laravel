<?php

namespace VanguardDK\Http\Requests\Role;

use VanguardDK\Http\Requests\Request;

class UpdateRoleRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $role = $this->route('role');

        return [
            'slug' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles,slug,' . $role->id
        ];
    }
}
