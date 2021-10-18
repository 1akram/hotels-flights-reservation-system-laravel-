<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name' );
            $table->string('country' );
            $table->string('phone');
            $table->string('wilaya');
            $table->string('ville');
            $table->string('cdPostal');
    
            $table->foreignId('user_id')->constrained('users');

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
        Schema::dropIfExists('air_lines');
    }
}
