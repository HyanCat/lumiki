<?php
/**
 * Document.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends BaseModel
{
	use SoftDeletes;
	protected $date = 'deleted_at';

	protected $fillable = ['title', 'content', 'body', 'category_id', 'user_id', 'slug', 'tags'];

	public function category()
	{
		return $this->hasOne('App\Models\Category', 'id', 'category_id');
	}

	public function user()
	{
		return $this->hasOne('App\Models\User', 'id', 'user_id');
	}

}