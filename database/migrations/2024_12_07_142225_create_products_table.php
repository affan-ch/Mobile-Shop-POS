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
            $table->string('name')->unique();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->text('description')->nullable();
            $table->integer('warranty_unit')->nullable();
            $table->integer('warranty_duration')->nullable(); // Warranty period
            $table->integer('qty')->default(0);
            $table->integer('sold_qty')->default(0);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade');
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
