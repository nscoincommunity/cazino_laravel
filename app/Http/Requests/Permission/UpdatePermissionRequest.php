<?php

namespace VanguardDK\Http\Requests\Permission;

class UpdatePermissionRequest extends BasePermissionRequest
{
   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $permission = $this->route('permission');

        return [
            'slug' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:permissions,slug,' . $permission->id,
			'name' => 'required'
        ];
    }
}
