<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
            $table->timestamps();
        });
		
		Schema::table('locations', function (Blueprint $table) {
            DB::table('locations')->insert([
										['name' => 'An Giang'],
										['name' => 'Bà Rịa Vũng Tàu'],
										['name' => 'Bình Dương']
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
        Schema::dropIfExists('locations');
    }
}
