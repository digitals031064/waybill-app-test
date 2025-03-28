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
        Schema::create('waybills', function (Blueprint $table) {
            $table->id();
            $table->string('waybill_no')->unique();
            $table->foreignId('consignee_id')->constrained('users');
            $table->foreignId('shipper_id')->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->string('shipment');
            $table->decimal('price', 10, 2);
            $table->decimal('cbm', 8, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waybills');
    }
};
