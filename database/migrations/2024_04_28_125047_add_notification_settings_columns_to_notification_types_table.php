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
        Schema::table('notification_types', function (Blueprint $table) {
            $table->string('heading')->after('name')->nullable();
            $table->string('subheading')->after('heading')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification_types', function (Blueprint $table) {
            $table->dropColumn('heading');
            $table->dropColumn('subheading');
        });
    }
};
