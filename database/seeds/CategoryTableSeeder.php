<?php

/**
 * CategoryTableSeeder.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
class CategoryTableSeeder extends BaseTableSeeder
{
	public function run()
	{
		foreach (range(1, 10) as $index) {
			\App\Models\Category::create([
				'name' => implode($this->faker->words(), ' '),
				'slug' => $this->faker->word(),
			]);
		}
	}
}