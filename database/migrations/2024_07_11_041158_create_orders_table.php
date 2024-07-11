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
            $table->unsignedBigInteger('id_admin');
            $table->string('name_user')->nullable();//khách hàng có thể điền tên hoặc mssv hoặc ko
            $table->string('total_money')->nullable();
            $table->string('quantity')->nullable();
            $table->enum('status',['cart','paid']);
            $table->enum('payment',['cash','bank_transfer'])->default('cash');
            $table->enum('lucky',['no','yes'])->default('no');
            $table->string('gift')->nullable();
            $table->timestamps();

            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_orders');
    }
};
