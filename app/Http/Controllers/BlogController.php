<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories', 'tags')
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        $categories = Category::withCount('posts')->orderBy('name')->get();
        $tags = Tag::withCount('posts')->orderBy('name')->get();
        $recentPosts = Post::where('status', 'published')->latest()->limit(5)->get();

        return view('web.screens.blog.index', compact('posts', 'categories', 'tags', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = Post::with('categories', 'tags')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->whereHas('categories', function ($q) use ($post) {
                $q->whereIn('categories.id', $post->categories->pluck('id'));
            })
            ->latest()
            ->limit(3)
            ->get();

        $recentPosts = Post::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('web.screens.blog.show', compact('post', 'relatedPosts', 'recentPosts'));
    }
}
