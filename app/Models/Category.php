<?php
/**
 * Category.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
	use SoftDeletes;
	protected $date = 'deleted_at';

	protected $fillable = ['name', 'slug'];

	public function docs()
	{
		return $this->hasMany('App\Models\Document', 'category_id', 'id');
	}

}