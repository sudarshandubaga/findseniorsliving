<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('why_choose_features', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->default('shield-check'); // Lucide icon name
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Seed initial data
        \DB::table('why_choose_features')->insert([
            ['title' => 'Personalized Care', 'description' => 'Tailored senior living and caregiving plans', 'icon' => 'user-heart', 'sort_order' => 1, 'created_at' => now()],
            ['title' => 'Legal Expertise', 'description' => 'Consultations with top elder lawyers today', 'icon' => 'gavel', 'sort_order' => 2, 'created_at' => now()],
            ['title' => 'Safe & Secure', 'description' => 'Trust-verified senior care homes nearby', 'icon' => 'shield-check', 'sort_order' => 3, 'created_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('why_choose_features');
    }
};
