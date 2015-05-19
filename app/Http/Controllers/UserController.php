<?php
/**
 * UserController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;


use App\Models\User;
use App\Models\UserToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->middleware('founder');
	}

	public function manage()
	{
		$users  = User::with('token')->get();
		$tokens = UserToken::whereNull('user_id')->where('active', false)->get();

		return view('user.manage', compact('users', 'tokens'));
	}

	public function destroy($id)
	{
		$this->cannotDeleteSelf($id);

		$user  = User::findOrFail($id);
		$token = UserToken::findOrFail($user->token_id);
		try {
			DB::beginTransaction();

			$user->delete();
			$token->delete();

			DB::commit();
		} catch (\Exception $e) {
			DB::rollback();

			return ret(-1, 'Delete user failed.');
		}

		return ret();
	}

	protected function cannotDeleteSelf($id)
	{
		if ($this->currentUser->id == $id) {
			throw new \Exception('Not Allowed!');
		}
	}

}