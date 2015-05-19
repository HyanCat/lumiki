<?php
/**
 * IndexController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;


use App\Models\Category;

class IndexController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		if (config('app.private')) {
			$this->middleware('auth');
		}
	}

	public function index()
	{
		$categories = Category::with('docs')->get();

		return view('page.index', compact('categories'));
	}

}