<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * * Apartment Table 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('longitude', 11, 8);
            $table->decimal('latitude', 10, 8);
            $table->string('cover_image')->unique();
            $table->integer('bathrooms_number');
            $table->integer('beds_number');
            $table->integer('square_meters');
            $table->string('address');
            $table->text('descriptions');
            $table->integer('rooms_number');
            $table->string('title', 255);
            $table->boolean('visibility')->default(1);
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
        Schema::dropIfExists('apartments');
    }
}
