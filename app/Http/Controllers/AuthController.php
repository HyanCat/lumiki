<?php
/**
 * AuthController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserToken;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{

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

	public function getRegister()
	{
		return view('auth.register');
	}

	public function postRegister(Request $request)
	{
		// register validator
		$this->validate($request, [
			'email'    => 'required|email',
			'name'     => 'required',
			'password' => 'required',
			'token'    => 'required',
		]);

		// check token
		$token = UserToken::where('token', $request->get('token'))->where('active', false)->whereNull('user_id')->first();
		if (is_null($token)) {
			return redirect()->back()->withInput($request->all())->withErrors('Token Check Failed');
		}

		// create user
		$input             = $request->except('token');
		$input['token_id'] = $token->id;
		try {
			DB::beginTransaction();

			$existUser = User::withTrashed()->where('email', $input['email'])->first();
			if (! is_null($existUser)) {
				if ($existUser->trashed()) {
					$existUser->restore();
					$existUser->token_id = $token->id;
					$existUser->save();
					$user = $existUser;
				}
				else {
					throw new \Exception('User with email ' . $input['email'] . ' already exist!');
				}
			}
			else {
				$user = User::create($input);
			}

			$token->user_id = $user->id;
			$token->active  = true;
			$token->save();

			Auth::login($user);

			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();

			return redirect()->back()->withInput($request->all())->withErrors('Register Failed');
		}

		return redirect()->route('index');
	}
}