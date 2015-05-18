<?php
/**
 * GuestMiddleware.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class GuestMiddleware
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
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest()) {
			return $next($request);
		}
		else {
			return redirect()->route('index');
		}
	}
}