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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nameProduct',255);
            $table->string('brandProduct',255);
            $table->string('idProduct',255);
            $table->string('sizeProduct',255);
            $table->string('imgProduct',255);
            $table->text('descriptionProduct')->nullable();
            $table->unsignedBigInteger('priceProduct');
            $table->unsignedSmallInteger('quantityProduct');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
