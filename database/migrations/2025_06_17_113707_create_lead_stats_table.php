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
        Schema::create('lead_stats', function (Blueprint $table) {    
            $table->date('date')->primary();
            $table->integer('new_count')->default(0);
            $table->integer('contacted_count')->default(0);
            $table->integer('closed_count')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_stats');
    }
};
