<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('first_name' ) ;
            $table->string('last_name' ) ;
            $table->string('sexe' ) ;
            $table->string('birth_day' ) ;
            $table->string('passport_number' ) ;
            $table->date('check_in') ; 
            $table->date('check_out') ;
            $table->integer('rooms')->unsigned() ;
            $table->float('total_price')->nullable() ;
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('room_id')->constrained('rooms');
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
        Schema::dropIfExists('reservation');
    }
}
