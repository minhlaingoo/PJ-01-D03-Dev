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
        Schema::table('devices', function (Blueprint $table) {
            $table->string('name');
            $table->string('model');
            $table->string('ip');
            $table->integer('port');
            $table->string('mac')->nullable();
            $table->boolean('is_active')->default(false);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn(['name', 'model', 'ip', 'mac', 'is_active', 'port']);
        });
    }
};
