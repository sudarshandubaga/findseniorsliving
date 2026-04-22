@extends('admin.layouts.app')

@section('title', 'Edit Page')
@section('header', 'Edit Page — ' . $page->title)

@section('content')
    <form action="{{ route('admin.pages.update', $page) }}" method="POST" id="page-form">
        @csrf @method('PUT')

        <div class="max-w-4xl space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Page Title</label>
                <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                    placeholder="e.g. Our Mission, Privacy Policy...">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Page Content</label>
                <textarea name="content" id="content-editor" class="tinymce-editor">{!! old('content', $page->content) !!}</textarea>
            </div>

            @include('admin.partials.seo-fields', [
                'metaTitle' => old('meta_title', $page->meta_title),
                'metaDescription' => old('meta_description', $page->meta_description),
                'metaKeywords' => old('meta_keywords', $page->meta_keywords),
                'canonicalUrl' => old('canonical_url', $page->canonical_url),
            ])

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl text-sm font-bold transition-colors shadow-lg shadow-primary/20">
                    Update Page
                </button>
                <a href="{{ route('admin.pages.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl text-sm font-bold transition-colors">
                    Cancel
                </a>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#content-editor',
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
        toolbar: 'undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        height: 500,
        border_width: 0,
        skin: 'oxide',
        content_css: 'default',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
@endpush