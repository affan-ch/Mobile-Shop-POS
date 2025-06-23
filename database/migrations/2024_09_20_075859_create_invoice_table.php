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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id'); // Foreign key to shops
            $table->decimal('total_bill', 10, 2); // Total bill with 2 decimal places
            $table->decimal('discount', 10, 2)->default(0); // Discount with 2 decimal places, default 0
            $table->decimal('final_bill', 10, 2); // Final bill with 2 decimal places
            $table->string('customer_name')->nullable(); // Customer name can be null
            $table->string('customer_phone')->nullable(); // Customer phone number can be null
            $table->text('customer_info')->nullable(); // Additional customer info, nullable
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade'); // Assuming shops are in 'users' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
