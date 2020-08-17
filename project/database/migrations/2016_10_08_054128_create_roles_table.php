<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
            $table->timestamps();
        });
		
		Schema::table('roles', function (Blueprint $table) {
            DB::table('roles')->insert([
										['name' => 'Thành Viên'],
										['name' => 'Nhân Viên'],
										['name' => 'Quản Lý']
									   ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
