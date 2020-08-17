<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->integer('type_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->longText('description');
			$table->integer('location')->unsigned();
			$table->integer('condition')->unsigned();
			$table->integer('brand')->unsigned();
			$table->decimal('price', 18, 0);
			$table->integer('user_id')->unsigned();
			$table->integer('approval')->default(0);
			$table->integer('approver')->unsigned()->nullable();
            $table->timestamps();
        });
		
		Schema::table('threads',function (Blueprint $table){
			$table->foreign('type_id')->references('id')->on('types');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->foreign('location')->references('id')->on('locations');
			$table->foreign('condition')->references('id')->on('conditions');
			$table->foreign('brand')->references('id')->on('brands');
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('approver')->references('id')->on('users');
			
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('threads');
    }
}
