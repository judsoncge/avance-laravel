<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableClassrooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function(Blueprint $table){
			$table->integer('id', true);
			$table->string('name')->unique;
			$table->enum('period', ['MATUTINO', 'VESPERTINO', 'NOTURNO', 'DISTÂNCIA']);
			$table->integer('course_id');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
