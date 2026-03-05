<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed initial data
        \DB::table('hero_slides')->insert([
            ['subtitle' => 'The Best Choice for Seniors', 'title' => 'Find the Perfect Living Space for Your Loved Ones', 'sort_order' => 1, 'created_at' => now()],
            ['subtitle' => 'Professional Caregivers', 'title' => 'Compassionate care for your seniors at home', 'sort_order' => 2, 'created_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
