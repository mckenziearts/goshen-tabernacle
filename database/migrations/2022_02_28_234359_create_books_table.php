<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('books', static function (Blueprint $table) {
            $table->id();

            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('edition')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
