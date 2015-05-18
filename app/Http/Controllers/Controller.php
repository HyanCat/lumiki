<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
	protected $currentUser;

	public function __construct()
	{
		$this->currentUser = \Auth::user();

		view()->composer('*', 'App\Http\ViewComposers\CurrentUserComposer');
	}

}
