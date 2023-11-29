<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('state')->default('pendiente');
            $table->unsignedbigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('table')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedbigInteger('plate_id')->nullable();
            $table->foreign('plate_id')->references('id')->on('plates');
            $table->unsignedbigInteger('drink_id')->nullable();
            $table->foreign('drink_id')->references('id')->on('drinks');
            $table->float('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
