<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_group_id')->constrained();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('company');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address');
            $table->bigInteger('tin')->unique();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
