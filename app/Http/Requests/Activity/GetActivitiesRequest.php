<?php

namespace VanguardDK\Http\Requests\Activity;

use VanguardDK\Http\Requests\Request;
use VanguardDK\User;

class GetActivitiesRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'per_page' => 'integer|max:100'
        ];
    }

    public function messages()
    {
        return [
            'per_page.max' => 'Maximum number of records per page is 100.'
        ];
    }
}
