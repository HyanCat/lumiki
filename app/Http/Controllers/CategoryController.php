<?php
/**
 * CategoryController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/18.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		if (! config('app.public')) {
			$this->middleware('auth');
		}
	}

	public function show($category)
	{
		$category = Category::with('docs')->where('slug', $category)->first();

		return view('category.show', compact('category'));
	}

	public function create()
	{
		return view('category.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'slug' => 'required|unique:categories',
		]);

		$category = Category::create($request->only(['name', 'slug']));

		return redirect()->route('cate', ['slug' => $category->slug]);
	}

	public function edit()
	{

	}

}