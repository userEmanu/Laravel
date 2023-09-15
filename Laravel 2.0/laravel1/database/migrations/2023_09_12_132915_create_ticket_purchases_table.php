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
        Schema::create('ticket_purchases', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('attraction_id');
                $table->integer('cantidad_boletos');
                $table->integer('precio');
                $table->timestamps();
    
                $table->foreign('attraction_id')->references('id')->on('attractions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_purchases');
    }
};
