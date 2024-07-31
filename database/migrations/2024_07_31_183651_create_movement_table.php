<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('movement', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        // Inserir data
        // DB::table('movement')->insert([
        //     ['name' => 'Deadlift'],
        //     ['name' => 'Back Squat'],
        //     ['name' => 'Bench Press']
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement');
    }
};
