<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('categories', 'tags');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        $posts = $query->latest()->paginate(15);
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->only('title', 'content', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url');
        $data['slug'] = $this->generateUniqueSlug($request->title);

        // Handle cropped image
        if ($request->filled('cropped_image')) {
            $imageData = $request->cropped_image;
            $image = str_replace('data:image/png;base64,', '', $imageData);
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'posts/' . Str::random(20) . '.png';
            \Storage::disk('public')->put($imageName, base64_decode($image));
            $data['featured_image'] = $imageName;
        }

        $post = Post::create($data);

        // Sync categories
        if ($request->filled('categories')) {
            $post->categories()->sync($request->categories);
        }

        // Handle tags (inline created)
        if ($request->filled('tag_names')) {
            $tagNames = explode(',', $request->tag_names);
            $tagIds = [];
            foreach ($tagNames as $name) {
                $name = trim($name);
                if (empty($name))
                    continue;
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        $post->load('tags', 'categories');

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->only('title', 'content', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url');
        $data['slug'] = $this->generateUniqueSlug($request->title, $post->id);

        // Handle cropped image
        if ($request->filled('cropped_image')) {
            $imageData = $request->cropped_image;
            $image = str_replace('data:image/png;base64,', '', $imageData);
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'posts/' . Str::random(20) . '.png';
            \Storage::disk('public')->put($imageName, base64_decode($image));
            $data['featured_image'] = $imageName;
        }

        $post->update($data);

        // Sync categories
        if ($request->filled('categories')) {
            $post->categories()->sync($request->categories);
        } else {
            $post->categories()->detach();
        }

        // Handle tags
        if ($request->filled('tag_names')) {
            $tagNames = explode(',', $request->tag_names);
            $tagIds = [];
            foreach ($tagNames as $name) {
                $name = trim($name);
                if (empty($name))
                    continue;
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($name)],
                    ['name' => $name]
                );
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }

    public function uploadCroppedImage(Request $request)
    {
        $request->validate([
            'cropped_image' => 'required|string',
        ]);

        $imageData = $request->cropped_image;
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'posts/' . Str::random(20) . '.png';
        \Storage::disk('public')->put($imageName, base64_decode($image));

        return response()->json([
            'path' => $imageName,
            'url' => asset('storage/' . $imageName),
        ]);
    }

    private function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->when($id, function ($query, $id) {
            return $query->where('id', '!=', $id);
        })->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
