<?php
/**
 * DocumentController.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		if (config('app.private')) {
			$this->middleware('auth');
		}
		else {
			$this->middleware('auth', ['except' => ['show']]);
		}
	}

	public function show($id)
	{
		$document       = Document::with('category')->with('user')->findOrFail($id);
		$document->tags = explode(',', $document->tags);

		return view('doc.show', compact('document'));
	}

	public function create()
	{
		$categories = Category::all();

		return view('doc.create', compact('categories'));
	}

	public function store(Request $request)
	{

		$this->validate($request, [
			'category_id' => 'required|numeric',
			'title'       => 'required',
			'content'     => 'required',
		]);
		$input            = $request->all();
		$tags             = preg_split('/[\n\r\t\s\,]+/i', $request->get('tags'));
		$input['tags']    = implode(',', $tags);
		$input['body']    = \Parsedown::instance()->setBreaksEnabled(true)->setMarkupEscaped(false)->text($request->get('content'));
		$input['user_id'] = $this->currentUser->id;

		$doc = Document::create($input);

		return redirect()->route('doc.show', ['id' => $doc->id]);
	}

	public function edit($id)
	{
		$categories = Category::all();
		$document   = Document::with('category')->findOrFail($id);

		return view('doc.edit', compact('categories', 'document'));
	}

	public function update($id, Request $request)
	{
		$this->validate($request, [
			'category_id' => 'required|numeric',
			'title'       => 'required',
			'content'     => 'required',
		]);

		$input         = $request->all();
		$input['tags'] = implode(',', preg_split('/[\n\r\t\s\,]+/i', $request->get('tags')));
		$input['body'] = \Parsedown::instance()->setBreaksEnabled(true)->setMarkupEscaped(false)->text($request->get('content'));

		$doc = Document::find($id)->update($input);

		return redirect()->route('doc.show', ['id' => $id]);
	}

	public function destroy($id)
	{

	}
}