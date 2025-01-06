<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bid_requests', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2024_10_30_131430_create_bid_requests_table.php
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->decimal('bid_amount', 10, 2)->nullable();
            $table->enum('bid_status', ['pending', 'accepted', 'rejected'])->default('pending');
========
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreignId('bid_request_id')->constrained()->cascadeOnDelete();
            $table->decimal('bid_price', 10, 2);
>>>>>>>> edaa50eb216b4ea1d8ac89f28f90a7083c62b570:database/migrations/2024_10_30_131431_create_bids_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bid__requests');
    }
};
