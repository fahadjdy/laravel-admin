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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Admin Name
            $table->string('username'); // Admin Name
            $table->string('slogan')->nullable(); // Optional slogan
            $table->string('email_1')->unique(); // Primary email
            $table->string('email_2')->nullable()->unique(); // Secondary email (optional)
            $table->string('contact_1'); // Primary contact number
            $table->string('contact_2')->nullable(); // Secondary contact (optional)
            $table->text('about')->nullable(); // About Company
            $table->text('address_1')->nullable(); // Primary address
            $table->text('address_2')->nullable(); // Secondary address (optional)
            $table->string('password'); // Password

            // New fields
            $table->string('logo')->nullable(); // Logo image path
            $table->string('favicon')->nullable(); // Favicon image path
            $table->string('about_image')->nullable(); // About image path
            $table->boolean('is_maintenance')->default(false); // Maintenance mode flag 
            $table->boolean('is_watermark')->default(false); // Watermarking flag (watermark will be as admin name or Company name)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
