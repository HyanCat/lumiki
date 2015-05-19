<?php
/**
 * UserToken.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

class UserToken extends BaseModel
{
	use SoftDeletes;
	protected $date = 'deleted_at';

	protected $fillable = ['token', 'user_id', 'active'];
}