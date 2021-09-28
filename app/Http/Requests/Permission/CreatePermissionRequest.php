<?php

namespace VanguardDK\Http\Requests\Permission;

class CreatePermissionRequest extends BasePermissionRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:permissions,slug',
			'name' => 'required'
        ];
    }
}
