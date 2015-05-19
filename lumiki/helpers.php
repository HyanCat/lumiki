<?php
/**
 * helpers.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */

/**
 * Language Function for View.
 * @param $key
 * @return mixed
 */
function L($key)
{
	return \Illuminate\Support\Facades\Lang::get('lumiki.' . strtolower($key));
}