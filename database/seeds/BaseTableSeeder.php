<?php

/**
 * BaseTableSeeder.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */

use Faker\Factory as Faker;

class BaseTableSeeder extends DatabaseSeeder
{
	protected $faker;

	public function __construct()
	{
		$this->faker = Faker::create('zh_CN');
	}

}