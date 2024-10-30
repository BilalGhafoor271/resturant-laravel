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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Product name
            $table->string('short_description'); // Short description
            $table->text('long_description'); // Long description
            $table->decimal('price', 10, 2); // Price (10 digits total, 2 decimals)
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to categories
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade'); // Foreign key to subcategories
            $table->json('images')->nullable(); // Store images as a JSON array
            $table->string('status');
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
