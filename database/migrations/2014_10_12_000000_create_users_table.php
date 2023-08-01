<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('gender');
            $table->string('hobby1');
            $table->string('hobby2');
            $table->string('hobby3');
            $table->string('email')->unique();
            $table->string('image');
            $table->string('instagram');
            $table->string('phone');
            // $table->integer('price')->default(rand(100000, 125000));
            $table->integer('wallet')->default(0);
            $table->string('password');
            // $table->timestamp('email_verified_at')->nullable();
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
};
