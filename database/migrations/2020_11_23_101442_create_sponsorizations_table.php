<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorizationsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * * Sponsorizations
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained();
            $table->foreignId('payment_plan_id')->constrained();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        Schema::dropIfExists('sponsorizations');
    }
}
