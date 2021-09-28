<?php

namespace VanguardDK\Http\Requests\Page;

use VanguardDK\Http\Requests\Request;
use VanguardDK\Page;

class CreatePageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
			'path' => 'required|unique:pages|max:255',
			'body' => 'required|min:50',
			'title' => 'required',
			'sub_title' => 'required',
			'description' => 'required',
			'keywords' => 'required',
        ];

        return $rules;
    }
}
