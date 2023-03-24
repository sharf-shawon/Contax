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
            $table->unsignedBigInteger('user_id');
            $table->unsignedFloat('total');
            $table->unsignedFloat('discount')->nullable();
            $table->unsignedFloat('payable');
            $table->unsignedFloat('paid');
            $table->string('address');
            $table->string('city');
            $table->string('region');
            $table->string('zip');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('status');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('payment_id');
            $table->string('details', 1000);
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
