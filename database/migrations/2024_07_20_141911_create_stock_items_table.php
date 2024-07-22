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
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stock_entry');
            $table->string('material_product')->nullable();
            $table->string('name_product');
            $table->unsignedDouble('quantity');
            $table->string('unit',20);
            $table->unsignedDouble('price');
            $table->timestamps();

            $table->foreign('id_stock_entry')->references('id')->on('stock_entries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_items');
    }
};

// INSERT INTO `stock_items` (`id`, `id_stock_entry`, `material_product`, `name_product`, `quantity`, `unit`, `price`, `total_price`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Trà', 'Trà tắc', '1', 'Hộp', '142000', '142000', '2024-07-12 22:37:03', '2024-07-12 22:37:03'), (NULL, '1', 'Trà', 'Trà tắc', '1', 'Hộp', '142000', '142000', '2024-07-12 22:37:03', '2024-07-12 22:37:03'), (NULL, '1', 'Tắc', 'Trà tắc', '1', 'Bịch', '2000', '2000', '2024-07-12 22:37:03', '2024-07-12 22:37:03'), (NULL, '1', 'Túi, ống hút', 'Trà tắc', '100', 'cái', '1290', '129000', '2024-07-12 22:37:03', '2024-07-12 22:37:03'), (NULL, '1', 'Đường', 'Trà tắc', '1', 'Kg', '27000', '27000', '2024-07-12 22:37:03', '2024-07-12 22:37:03'), (NULL, '1', 'Đá', 'Trà tắc', '1', 'Bịch', '7000', '7000', '2024-07-12 22:37:03', '2024-07-12 22:37:03');
