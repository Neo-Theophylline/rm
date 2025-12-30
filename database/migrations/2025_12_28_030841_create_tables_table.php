<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tables', function (Blueprint $table) {
        $table->id();
        $table->string('table_name'); // Meja 1
        $table->string('floor');        // Lantai 1
        $table->enum('status', ['available', 'reserved', 'occupied'])->default('available');
        $table->enum('type', ['regular', 'premium'])->default('regular');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
