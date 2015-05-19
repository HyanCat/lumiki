<?php
/**
 * UserTokenController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;


use App\Models\UserToken;

class UserTokenController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->middleware('founder');
	}

	public function store()
	{
		$token = md5(str_random() . time());
		$token = UserToken::create(compact('token'));

		return ret(0, $token->toArray());
	}

	public function destroy($id)
	{
		$token = UserToken::findOrFail($id);
		$token->delete();

		return ret();
	}
}