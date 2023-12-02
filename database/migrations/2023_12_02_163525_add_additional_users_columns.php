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
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_number')->unique()->after('id');
            $table->unsignedBigInteger('store_number')->after('employee_number');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('set null')->after('store_number');
            $table->index(['store_number', 'department_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['store_number', 'department_id']);
            $table->dropConstrainedForeignId('department_id');
            $table->dropColumn('store_number');
            $table->dropColumn('employee_number');
        });
    }
};
