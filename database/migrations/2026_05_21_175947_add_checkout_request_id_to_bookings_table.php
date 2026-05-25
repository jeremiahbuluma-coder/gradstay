<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            if (!Schema::hasColumn('bookings', 'checkout_request_id')) {
                $table->string('checkout_request_id')->nullable();
            }

            if (!Schema::hasColumn('bookings', 'payment_status')) {
                $table->string('payment_status')
                    ->default('pending');
            }

        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {

            if (Schema::hasColumn('bookings', 'checkout_request_id')) {
                $table->dropColumn('checkout_request_id');
            }

            if (Schema::hasColumn('bookings', 'payment_status')) {
                $table->dropColumn('payment_status');
            }

        });
    }
};