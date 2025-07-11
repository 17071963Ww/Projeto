<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_tag', function (Blueprint $table) {
            $table->foreignId('card_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->primary(['card_id', 'tag_id']);
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_tag');
    }
};