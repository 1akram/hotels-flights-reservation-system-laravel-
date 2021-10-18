<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->unsigned()->default( config('roles.role')['client']);
            $table->string('avatar')->nullable();
            $table->string('name' );
            $table->string('lastName' )->nullable();
            $table->string('sex')->nullable();
            $table->date('birthDay')->nullable();
            $table->string('phone')->nullable();
            $table->string('street', 40)->nullable();   
            $table->string('city', 40)->nullable();
            $table->string('state', 40)->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country', 40)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
