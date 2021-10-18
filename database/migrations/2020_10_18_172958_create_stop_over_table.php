<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStopOverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stop_over', function (Blueprint $table) {
            $table->id();
            $table->boolean('stop_over_type');// 0 aller 
            $table->string('lieu', 100)  ;
            $table->string('air_port', 100)  ;
            $table->string('temp_arrive', 100) ;
            $table->string('temp_depart', 100)  ;
            $table->string('duree', 100)  ;
            
            $table->foreignId('flight_id')->constrained('flights');


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
        Schema::dropIfExists('stop_over');
    }
}
