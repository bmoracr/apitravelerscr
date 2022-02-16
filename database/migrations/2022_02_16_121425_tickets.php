<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            
            $table->double('tax', 8, 2);
            $table->double('subTotal', 8, 2);
            $table->double('totalPrice', 8, 2);
            $table->string('costumerCode');
            $table->string('title');
            $table->string('costumerName');
            $table->string('phoneNumber');
            $table->string('email');
            $table->string('acceptTerms');
            $table->string('productsId');
            
            $table->timestamp('last_used_at')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}