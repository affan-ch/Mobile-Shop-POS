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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Foreign key to products
            $table->unsignedBigInteger('shop_id'); // Foreign key to shops
            $table->date('sale_date'); // Date of the sale
            $table->decimal('sale_price', 10, 2); // Sale price with 2 decimal places
            $table->unsignedBigInteger('invoice_id'); // Foreign key to invoices
            // add quantity column
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2); // Total price with 2 decimal places
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade'); // Assuming shops are in 'users' table
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
