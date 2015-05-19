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

/**
 * Convert Date to Semantic Text.
 * @param $date
 * @return string
 */
function semanticDate($date)
{
	$time = strtotime($date);

	return semanticTime($time);
}

/**
 * Convert UNIX Timestamp to Semantic Text.
 * @param $time
 * @return string
 */
function semanticTime($time)
{
	$delta = time() - $time;
	if ($delta < 0) {
		return 'Time Error!';
	}
	if ($delta < 60) {
		return $delta . L('seconds_ago');
	}
	if ($delta < 60 * 60) {
		return intval($delta / 60) . L('minites_ago');
	}
	if ($delta < 24 * 60 * 60) {
		return intval($delta / (60 * 60)) . L('hours_ago');
	}
	if ($delta < 4 * 24 * 60 * 60) {
		return intval($delta / (24 * 60 * 60)) . L('days_ago');
	}

	return date(L('normal_format'), $time);
}

/**
 * Return a formated response.
 * @param int    $errorCode
 * @param string $message
 * @return mixed
 */
function ret($errorCode = 0, $message = '')
{
	$content = [
		'error'   => $errorCode,
		'message' => $message,
	];

	return new Illuminate\Http\Response(json_encode($content));
}