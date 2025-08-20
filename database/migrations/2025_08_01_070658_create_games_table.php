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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_a_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('team_b_id')->constrained('teams')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->string('location')->nullable();
            $table->string('score')->nullable(); // пример: '2:1'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
