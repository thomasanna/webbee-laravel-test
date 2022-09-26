<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaSchema extends Migration
{
    /**
    # Create a migration that creates all tables for the following user stories

    For an example on how a UI for an api using this might look like, please try to book a show at https://in.bookmyshow.com/.
    To not introduce additional complexity, please consider only one cinema.

    Please list the tables that you would create including keys, foreign keys and attributes that are required by the user stories.

    ## User Stories

     **Movie exploration**
     * As a user I want to see which films can be watched and at what times
     * As a user I want to only see the shows which are not booked out

     **Show administration**
     * As a cinema owner I want to run different films at different times
     * As a cinema owner I want to run multiple films at the same time in different locations

     **Pricing**
     * As a cinema owner I want to get paid differently per show
     * As a cinema owner I want to give different seat types a percentage premium, for example 50 % more for vip seat

     **Seating**
     * As a user I want to book a seat
     * As a user I want to book a vip seat/couple seat/super vip/whatever
     * As a user I want to see which seats are still available
     * As a user I want to know where I'm sitting on my ticket
     * As a cinema owner I dont want to configure the seating for every show
     */
    public function up()
    {
        throw new \Exception('implement in coding task 4, you can ignore this exception if you are just running the initial migrations.');

        Schema::create('cinema', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('county')->nullable();
            $table->string('mobile')->nullable();
            $table->string('no_of_seats')->nullable();
            $table->timestamps();
        });

        Schema::create('movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_id')->nullable();
            $table->foreign('cinema_id')->references('id')->on('cinema')->cascadeOnDelete();
            $table->string('name')->nullable();           
            $table->timestamps();
        });

        Schema::create('movie_shows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id')->nullable();
            $table->foreign('movie_id')->references('id')->on('movie')->cascadeOnDelete();
            $table->string('date')->nullable();   
            $table->string('time')->nullable();  
            $table->string('normal_price')->nullable();  
            $table->string('vip_seat_price')->nullable();
            $table->string('couple_seat_price')->nullable();
            $table->string('super_vip_price')->nullable();
            $table->string('available_seats')->nullable();             
            $table->string('available_vip_seats')->nullable(); 
            $table->string('available_couple_seats')->nullable(); 
            $table->string('available_super_vip_seats')->nullable();    
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
    }
}
