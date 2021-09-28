<?php

namespace VanguardDK\Http\Requests\Game;

use VanguardDK\Http\Requests\Request;
use VanguardDK\Game;

class CreateGameRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'title' => 'required',
			'percent' => 'required',
			'gameline' => 'required',
			'bet' => 'required',
			'winline' => 'required',
			'garant_win' => 'required',
			'winbonus' => 'required',
			'garant_bonus' => 'required',
			'gamebank' => 'required',
			'match_winline' => 'required',
			'match_winbonus' => 'required',
			'reelStrip1' => 'required',
			'reelStrip2' => 'required',
			'reelStrip3' => 'required',
			'reelStrip4' => 'required',
			'reelStrip5' => 'required',
			'reelStrip6' => 'required',
			'reelStripBonus1' => 'required',
			'reelStripBonus2' => 'required',
			'reelStripBonus3' => 'required',
			'reelStripBonus4' => 'required',
			'reelStripBonus5' => 'required',
			'reelStripBonus6' => 'required',
        ];

        return $rules;
    }
}
