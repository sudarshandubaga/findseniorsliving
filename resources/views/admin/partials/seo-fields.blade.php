<!-- SEO Meta Details -->
<div class="bg-white rounded-2xl border border-gray-100 p-6">
    <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-8 bg-emerald-50 rounded-lg flex items-center justify-center">
            <i data-lucide="search" class="w-4 h-4 text-emerald-500"></i>
        </div>
        <h3 class="font-bold text-gray-800 text-sm">SEO Meta Details</h3>
    </div>

    <div class="space-y-4">
        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $metaTitle ?? '') }}"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                placeholder="SEO title (60 chars recommended)..." maxlength="70">
            <p class="text-gray-400 text-[10px] mt-1">Leave empty to use the page/post title</p>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Meta Description</label>
            <textarea name="meta_description" rows="3"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                placeholder="SEO description (160 chars recommended)..."
                maxlength="170">{{ old('meta_description', $metaDescription ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Meta Keywords</label>
            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $metaKeywords ?? '') }}"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                placeholder="keyword1, keyword2, keyword3...">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Canonical URL</label>
            <input type="url" name="canonical_url" value="{{ old('canonical_url', $canonicalUrl ?? '') }}"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                placeholder="https://example.com/canonical-url">
        </div>
    </div>
</div>