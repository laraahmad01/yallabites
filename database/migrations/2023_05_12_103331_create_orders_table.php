<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   /* public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('store_id');
            $table->string('address');
            $table->string('payment_option');
            $table->decimal('total', 8, 2);
            $table->decimal('delivery_charge', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('store_id')->references('id')->on('stores');
        });*/
        public function up(): void
        {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->unsignedInteger('quantity');
            $table->decimal('total_price', 8, 2);
            $table->enum('payment_method', ['online', 'cash_on_delivery']);
            $table->string('shipping_address');
            $table->string('billing_address');
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
