<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafe_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('table_number');
            $table->integer('capacity');
            $table->enum('status', ['available', 'reserved', 'occupied'])->default('available');
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafe_tables');
    }
};
