<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('open_ai_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->text('image');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('open_ai_images');
    }
};
