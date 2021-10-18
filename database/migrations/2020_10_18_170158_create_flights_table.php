<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('depart', 100) ;
            $table->string('arret', 100) ;
            $table->string('service', 100) ;
            $table->boolean('flight_type'); // 0 aller  1 aller retour
            $table->float('price');

            $table->integer('place_num');
            
            $table->date('aller');
            $table->string('aller_depar_heur', 100) ;
            $table->string('aller_arret_heur', 100) ;
            $table->string('aller_duree', 100) ;
            
            $table->date('retour')->nullable();
            $table->string('retour_depar_heur', 100)->nullable() ;
            $table->string('retour_arret_heur', 100)->nullable() ;
            $table->string('retour_duree', 100)->nullable() ;
            
            $table->foreignId('air_lines_id')->constrained('air_lines');

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
        Schema::dropIfExists('flights');
    }
}
