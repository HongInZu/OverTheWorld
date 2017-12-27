<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Delete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_predict_vip', function ($table) {
            $table->softDeletes();
        });        
        Schema::table('game_predict_bigandsmall', function ($table) {
            $table->softDeletes();
        }); 
        Schema::table('game_predict_bigandsmall_vip', function ($table) {
            $table->softDeletes();
        }); 
        Schema::table('game_predict', function ($table) {
            $table->softDeletes();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
