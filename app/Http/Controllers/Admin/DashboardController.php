<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Page;
use App\Models\HeroSlide;
use App\Models\WhyChooseFeature;

class DashboardController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $pageCount = Page::count();
        $heroCount = HeroSlide::count();
        $featureCount = WhyChooseFeature::count();
        $recentPosts = Post::with('categories')->latest()->limit(5)->get();
        $pages = Page::latest()->limit(5)->get();

        return view('admin.dashboard', compact('postCount', 'categoryCount', 'tagCount', 'pageCount', 'heroCount', 'featureCount', 'recentPosts', 'pages'));
    }
}
