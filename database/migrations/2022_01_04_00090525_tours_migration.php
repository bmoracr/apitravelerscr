<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ToursMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            //key
            $table->id();
            //Titles
            $table->string('code');
            $table->text('name');
            $table->longText('description');

            
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');

            $table->longText('includes');
            $table->longText('additional');
            //Prices
            $table->double('p_web_plus', 8, 2);
            $table->double('p_web_less', 8, 2);
            $table->double('p_brouchure_rack', 8, 2);
            $table->double('p_brouchure_neto', 8, 2);
            $table->double('p_brouchure_comission', 8, 2);
            //Validation
            $table->boolean('status');
            $table->boolean('to_brouchure');
            $table->boolean('to_web');
            $table->boolean('to_seasonal');
            //Register
            $table->string('username');
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
