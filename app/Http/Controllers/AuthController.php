<?php
/**
 * AuthController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	protected $auth;

	public function __construct()
	{
		parent::__construct();

		$this->middleware('guest', ['except' => ['getLogout']]);
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email'    => 'required|email',
			'password' => 'required',
		]);
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials, $request->has('remember'))) {
			return redirect()->route('index');
		}

		return redirect()->back()->withInput($request->only('email', 'remember'));
	}

	public function getLogout()
	{
		Auth::logout();

		return redirect()->route('index');
	}
}