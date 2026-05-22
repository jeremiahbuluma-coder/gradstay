<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('listings', 'image')) {
            Schema::table('listings', function (Blueprint $table) {
                $table->string('image')->nullable()->after('price');
            });
        }
    }

    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            if (Schema::hasColumn('listings', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};