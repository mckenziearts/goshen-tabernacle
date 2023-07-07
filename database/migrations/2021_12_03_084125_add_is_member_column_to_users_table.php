<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table): void {
            $table->after('profession', function ($table): void {
                $table->string('city')->nullable();
                $table->boolean('is_member')->default(true);
                $table->timestamp('joined_at')->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table): void {
            $table->dropColumn(['city', 'is_member', 'joined_at']);
        });
    }
};
