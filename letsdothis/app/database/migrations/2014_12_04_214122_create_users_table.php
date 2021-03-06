<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create table
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->timestamps();
            $table->string('remember_token');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//destroy table
        Schema::drop('users');
	}

}
