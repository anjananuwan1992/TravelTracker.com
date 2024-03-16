<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('details');
            $table->text('latitude');
            $table->text('longitude');
            $table->string('email');
            $table->string('price');
            $table->string('contact');
            $table->string('currency');
            $table->string('fname');
            $table->string('lname');
            $table->string('img_one')->nullable();
            $table->string('img_two')->nullable();
            $table->string('img_three')->nullable();
            $table->string('img_four')->nullable();
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
        Schema::dropIfExists('tours');
    }
}
