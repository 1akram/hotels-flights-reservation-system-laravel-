<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->text('description');
            $table->integer('stars')->unsigned();
            $table->string('contact_name', 40);
            $table->string('contact_phone', 40);
            $table->string('contact_email', 40);
            $table->string('street', 40);   
            $table->string('city', 40);
            $table->string('state', 40);
            $table->string('postal_code');
            $table->string('country', 40);
            $table->string('lat');
            $table->string('lng');
            $table->boolean('confirmed')->default(false);
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
        Schema::dropIfExists('hotels');
    }
}
