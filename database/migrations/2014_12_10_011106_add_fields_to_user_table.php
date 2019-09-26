<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			// add bio,gender,dob,pic,country,state,city,address,postal
			$table->text('bio')->nullable();
			$table->string('gender')->nullable();
			$table->date('dob')->nullable();
			$table->string('pic')->nullable();
			$table->string('country')->nullable();

			$table->string('city')->nullable();
			$table->string('address')->nullable();
			$table->string('postal')->nullable();
            $table->integer('provinceId')->nullable();
            $table->integer('kadaaId')->nullable();
            $table->string('phone')->nullable();
            $table->text('specialneeds')->nullable();
            $table->text('highesteducation')->nullable();
            $table->string('graduated')->nullable();
            $table->text('currentwork')->nullable();
            $table->string('worktimings')->nullable();
            $table->string('workavailable')->nullable();
            $table->string('worktype')->nullable();
            $table->text('equipments')->nullable();
            $table->string('workposition')->nullable();
            $table->string('worktime')->nullable();
            $table->integer('registerstep')->nullable();
            $table->text('availableshifts')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			// delete above columns
			$table->dropColumn(array('bio', 'gender', 'dob', 'pic', 'country', 'city', 'address', 'postal'));
		});
	}

}
