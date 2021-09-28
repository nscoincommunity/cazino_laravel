<?php

namespace VanguardDK\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class SetLanguage
 * @package VanguardDK\Http\Middleware
 */
class SetLanguage
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $langCode = $request->cookie('language');
        if (!empty($langCode) && in_array($langCode, ['ru', 'en', 'de'], true)) {
            app()->setLocale($langCode);
        }

        return $next($request);
    }
}
