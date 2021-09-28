<?php

namespace VanguardDK\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {			
				if (!$request->is('api*')) {
					if ($request->is('backend*')) {
						return redirect()->guest('/backend/login');
					}
					return redirect()->guest('login');
				}
            }
        }else{
			if (!$request->is('api*')) {
				if ($request->is('backend*') && !$this->auth->user()->hasPermission('access.admin.panel') ) {
					return redirect()->to('/');
				}	
				if ( !$request->is('backend*') && $this->auth->user()->hasPermission('access.admin.panel') ) {
					return redirect()->to('/backend/');
				}
			}
		}

        return $next($request);
    }
}
