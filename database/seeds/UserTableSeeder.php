<?php

/**
 * UserTableSeeder.php
 * lumiki
 *
 * Created by HyanCat on 15/5/17.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
class UserTableSeeder extends BaseTableSeeder
{
	public function run()
	{
		foreach (range(1, 10) as $index) {
			\App\Models\User::create([
				'email'    => $this->faker->email(),
				'name'     => $this->faker->name(),
				'password' => \Illuminate\Support\Facades\Hash::make('password'),
			]);
		}
	}
}