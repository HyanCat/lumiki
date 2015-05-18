<?php

/**
 * DocumentTableSeeder.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
class DocumentTableSeeder extends BaseTableSeeder
{
	public function run()
	{
		$users = \App\Models\User::lists('id');
		$cates = \App\Models\Category::lists('id');
		foreach (range(1, 100) as $index) {
			$content = implode($this->faker->paragraphs(), ' ');
			\App\Models\Document::create([
				'title'       => $this->faker->sentence(),
				'content'     => $content,
				'body'        => $content,
				'user_id'     => $this->faker->randomElement($users),
				'category_id' => $this->faker->randomElement($cates),
			]);
		}
	}

}