<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignTableDisciplineUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discipline_user', function(Blueprint $table){
			$table->foreign('discipline_id')->references('id')->on('disciplines');
			$table->foreign('user_id')->references('id')->on('users');
		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discipline_user', function(Blueprint $table){
			$table->dropForeign('discipline_id');
			$table->dropForeign('user_id');
		
		});
    }
}
