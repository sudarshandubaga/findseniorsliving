@extends('admin.layouts.app')

@section('title', 'Create Page')
@section('header', 'Create New Page')

@section('content')
    <form action="{{ route('admin.pages.store') }}" method="POST" id="page-form">
        @csrf

        <div class="max-w-4xl space-y-6">
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Page Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                    placeholder="e.g. Our Mission, Privacy Policy...">
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Page Content</label>
                <input type="hidden" name="content" id="content-input">
                <div id="content-editor">{!! old('content') !!}</div>
            </div>

            @include('admin.partials.seo-fields', [
                'metaTitle' => old('meta_title'),
                'metaDescription' => old('meta_description'),
                'metaKeywords' => old('meta_keywords'),
            ])

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-xl text-sm font-bold transition-colors shadow-lg shadow-primary/20">
                    Create Page
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
    var contentQuill = new Quill('#content-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });

    document.getElementById('page-form').addEventListener('submit', function() {
        document.getElementById('content-input').value = contentQuill.root.innerHTML;
    });
</script>
@endpush