<?php

declare(strict_types=1);

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table): void {
            $table->id();

            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('type')->nullable();
            $table->string('audio_link')->nullable();
            $table->string('video_link')->nullable();

            $table->foreignIdFor(Author::class)->nullable()->constrained();
            $table->foreignIdFor(Book::class)->nullable()->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
