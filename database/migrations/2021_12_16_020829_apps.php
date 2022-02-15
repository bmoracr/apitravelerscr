<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Apps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string('app_id', 64)->unique();
            $table->string('app_name');
            $table->string('comercial_name');
            $table->double('iva', 8, 2);
            $table->string('phone_number');
            $table->text('sociable_whatsapp')->nullable();
            $table->text('sociable_instagram')->nullable();
            $table->text('sociable_facebook')->nullable();
            $table->text('sociable_twiter')->nullable();
            $table->text('sociable_linkedin')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('apps');
    }
}
 