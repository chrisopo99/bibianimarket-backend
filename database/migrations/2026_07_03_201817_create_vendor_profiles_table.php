<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendor_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('business_name');
            $table->string('slug')->unique();

            $table->string('logo')->nullable();
            $table->string('cover_photo')->nullable();

            $table->text('description')->nullable();

            $table->boolean('verified')->default(false);

            $table->decimal('rating', 3, 2)->default(0);

            $table->unsignedInteger('followers')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendor_profiles');
    }
};