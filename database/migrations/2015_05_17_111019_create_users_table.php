<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	protected $table = 'users';

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->table, function (Blueprint $table) {
			$table->increments('id');
			$table->string('email')->index();
			$table->string('name')->index();
			$table->string('password');
			$table->string('remember_token')->nullable();

			$table->softDeletes();
			$table->timestamps();

			$table->unique('email');
		});

		$this->seedBasicData();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->table);
	}

	protected function seedBasicData()
	{
		\App\Models\User::create([
			'email'    => env('FOUNDER_EMAIL', 'founder@lumiki.cn'),
			'name'     => env('FOUNDER_NAME', 'founder'),
			'password' => Hash::make(env('FOUNDER_PASSWORD', 'Lumiki_Founder')),
		]);
	}

}
