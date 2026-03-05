<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Migrate existing category_id data to pivot table
        $posts = DB::table('posts')->whereNotNull('category_id')->get();
        foreach ($posts as $post) {
            DB::table('category_post')->insert([
                'category_id' => $post->category_id,
                'post_id' => $post->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
        });

        Schema::dropIfExists('category_post');
    }
};
