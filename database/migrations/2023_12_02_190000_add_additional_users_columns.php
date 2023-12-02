<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('location_id')->nullable()->constrained('locations');
            $table->boolean('is_admin');
            $table->index(['location_id', 'is_admin']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['location_id', 'is_admin']);
            $table->dropColumn('is_admin');
            $table->dropConstrainedForeignId('location_id');
        });
    }
};
