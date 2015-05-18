<?php
/**
 * CurrentUserComposer.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\ViewComposers;


class CurrentUserComposer
{
	public function compose($view)
	{
		$currentUser = \Auth::user();
		$view->with(compact('currentUser'));
	}
}