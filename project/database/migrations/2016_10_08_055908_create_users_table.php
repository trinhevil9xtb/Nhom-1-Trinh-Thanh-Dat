<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
			$table->string('address')->nullable();
			$table->date('birth')->nullable();
			$table->integer('sex')->nullable();
			$table->string('phone')->nullable();
			$table->integer('location')->unsigned()->nullable();
			$table->integer('role_id')->unsigned()->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
		
		Schema::table('users',function (Blueprint $table){
			$table->foreign('location')->references('id')->on('locations');
			$table->foreign('role_id')->references('id')->on('roles');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
