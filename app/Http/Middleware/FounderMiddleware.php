<?php
/**
 * FounderMiddleware.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class FounderMiddleware
{
	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 * @return mixed
	 * @throws \Exception
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest()) {
			if ($request->ajax()) {
				return response('Unauthorized.', 401);
			}
			else {
				return redirect()->route('login');
			}
		}
		elseif ($this->auth->user()->id > 1) {
			// We assumed the founder's id is 1.
			throw new \Exception('Not Allowed.');
		}

		return $next($request);
	}
}