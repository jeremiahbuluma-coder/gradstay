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
        Schema::table('listings', function (Blueprint $table) {

            // ADD ONLY IF THEY DON'T EXIST ALREADY

            if (!Schema::hasColumn('listings', 'image_url')) {
                $table->string('image_url')->nullable();
            }

            if (!Schema::hasColumn('listings', 'video_url')) {
                $table->string('video_url')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {

            if (Schema::hasColumn('listings', 'image_url')) {
                $table->dropColumn('image_url');
            }

            if (Schema::hasColumn('listings', 'video_url')) {
                $table->dropColumn('video_url');
            }

        });
    }
};