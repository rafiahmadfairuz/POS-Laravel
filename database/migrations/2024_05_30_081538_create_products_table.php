<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->string('product_type');
            $table->integer('initial_quantity');
            $table->decimal('sell_price', 8, 2);
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('vat', 8, 2);
            $table->bigInteger('barcode')->unique();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
