<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_reservation', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100)  ;
            $table->string('last_name', 100)  ;
            $table->string('birth_date', 100)  ;
            $table->string('sexe' ) ;
            $table->string('passport_number' ) ;
             $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('flight_reservation');
    }
}
