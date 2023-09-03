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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->dateTime('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->unsignedInteger('quantity');
            $table->unsignedTinyInteger('is_supply');
            $table->unsignedTinyInteger('is_realization');
            $table->unsignedInteger('quantity_full');
            $table->string('warehouse_name');
            $table->unsignedTinyInteger('in_way_to_client');
            $table->unsignedTinyInteger('in_way_from_client');
            $table->unsignedBigInteger('nm_id');
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->string('sc_code');
            $table->decimal('price');
            $table->decimal('discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
