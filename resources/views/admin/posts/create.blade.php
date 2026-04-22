@extends('admin.layouts.app')

@section('title', 'Create Post')
@section('header', 'Create New Post')

@section('content')
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" id="post-form">
        @csrf
        <input type="hidden" name="cropped_image" id="cropped-image-input">
        <input type="hidden" name="tag_names" id="tag-names-input">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary"
                        placeholder="Enter post title...">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Content</label>
                    <textarea name="content" id="content-editor" class="tinymce-editor">{!! old('content') !!}</textarea>
                </div>

                @include('admin.partials.seo-fields', [
                    'metaTitle' => old('meta_title'),
                    'metaDescription' => old('meta_description'),
                    'metaKeywords' => old('meta_keywords'),
                    'canonicalUrl' => old('canonical_url'),
                ])
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Status</label>
                    <select name="status"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>

                <!-- Multi Categories -->
                <div class="bg-white rounded-2xl border border-gray-100 p-6">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Categories</label>
                    <div class="space-y-2 max-h-48 overflow-y-auto">
                        @foreach($categories as $category)
                            <label class="flex items-center gap-2 cursor-pointer hover:bg-gray-50 px-2 py-1.5 rounded-lg transition-colors">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary"
                                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                <span class="text-sm text-gray-600">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    @if($categories->isEmpty())
                        <p class="text-gray-400 text-xs">No categories. <a href="{{ route('admin.categories.index') }}" class="text-primary hover:underline">Create one</a>.</p>
                    @endif
                </div>

                <!-- Inline Tags with Autocomplete -->
                <div class="bg-white rounded-2xl border border-gray-100 p-6" x-data="tagInput()">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Tags</label>
                    <div class="bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 flex flex-wrap gap-2 min-h-[42px] focus-within:ring-2 focus-within:ring-primary/20 focus-within:border-primary">
                        <template x-for="(tag, index) in selectedTags" :key="index">
                            <span class="bg-primary/10 text-primary text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                <span x-text="tag"></span>
                                <button type="button" @click="removeTag(index)" class="hover:text-red-500 transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </span>
                        </template>
                        <input type="text" x-model="query" @input="fetchSuggestions" @keydown.enter.prevent="addTag(query)"
                            @keydown.comma.prevent="addTag(query)" @keydown.backspace="handleBackspace"
                            class="flex-1 min-w-[100px] bg-transparent text-sm outline-none border-none focus:ring-0 p-0"
                            placeholder="Type to add tags...">
                    </div>
                    <!-- Autocomplete Dropdown -->
                    <div x-show="suggestions.length > 0" x-transition
                        class="mt-1 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden z-50 relative">
                        <template x-for="(suggestion, i) in suggestions" :key="i">
                            <button type="button" @click="addTag(suggestion.name); suggestions = []"
                                class="w-full text-left px-4 py-2 text-sm hover:bg-primary/5 hover:text-primary transition-colors"
                                x-text="suggestion.name"></button>
                        </template>
                    </div>
                    <p class="text-gray-400 text-[10px] mt-2">Press Enter or comma to add a new tag</p>
                </div>

                <!-- Featured Image with Crop -->
                <div class="bg-white rounded-2xl border border-gray-100 p-6" x-data="imageCropper()">
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-widest mb-2">Featured Image</label>

                    <!-- Preview -->
                    <div x-show="croppedPreview" class="mb-3">
                        <img :src="croppedPreview" class="w-full h-40 object-cover rounded-xl border border-gray-100">
                        <button type="button" @click="removeImage()"
                            class="mt-2 text-red-500 text-xs font-bold hover:underline">Remove Image</button>
                    </div>

                    <!-- File Input -->
                    <div x-show="!croppedPreview">
                        <input type="file" accept="image/*" @change="loadImage($event)"
                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                    </div>

                    <!-- Crop Modal -->
                    <div x-show="showCropper" class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4" x-transition>
                        <div class="bg-white rounded-2xl max-w-2xl w-full p-6">
                            <h3 class="font-bold text-gray-800 mb-4">Crop Image</h3>
                            <div class="max-h-96 overflow-hidden rounded-xl">
                                <img id="crop-image" class="max-w-full">
                            </div>
                            <div class="flex gap-3 mt-4">
                                <button type="button" @click="cropImage()"
                                    class="bg-primary hover:bg-primary/90 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition-colors">
                                    Crop & Save
                                </button>
                                <button type="button" @click="cancelCrop()"
                                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-xl text-sm font-bold transition-colors">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-primary hover:bg-primary/90 text-white px-5 py-3 rounded-xl text-sm font-bold transition-colors shadow-lg shadow-primary/20">
                        Publish Post
                    </button>
                    <a href="{{ route('admin.posts.index') }}"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-3 rounded-xl text-sm font-bold transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    // TinyMCE Editor
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

    // Tag Input Component
    function tagInput() {
        return {
            selectedTags: [],
            query: '',
            suggestions: [],
            debounceTimer: null,

            fetchSuggestions() {
                clearTimeout(this.debounceTimer);
                if (this.query.length < 1) { this.suggestions = []; return; }
                this.debounceTimer = setTimeout(() => {
                    fetch(`{{ route('admin.tags.search') }}?q=${encodeURIComponent(this.query)}`)
                        .then(r => r.json())
                        .then(data => {
                            this.suggestions = data.filter(t => !this.selectedTags.includes(t.name));
                        });
                }, 250);
            },

            addTag(name) {
                name = name.trim();
                if (name && !this.selectedTags.includes(name)) {
                    this.selectedTags.push(name);
                }
                this.query = '';
                this.suggestions = [];
                this.syncHidden();
            },

            removeTag(index) {
                this.selectedTags.splice(index, 1);
                this.syncHidden();
            },

            handleBackspace() {
                if (this.query === '' && this.selectedTags.length > 0) {
                    this.selectedTags.pop();
                    this.syncHidden();
                }
            },

            syncHidden() {
                document.getElementById('tag-names-input').value = this.selectedTags.join(',');
            }
        };
    }

    // Image Cropper Component
    function imageCropper() {
        return {
            showCropper: false,
            croppedPreview: null,
            cropper: null,

            loadImage(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.showCropper = true;
                    this.$nextTick(() => {
                        const img = document.getElementById('crop-image');
                        img.src = e.target.result;
                        if (this.cropper) this.cropper.destroy();
                        this.cropper = new Cropper(img, {
                            aspectRatio: 16 / 9,
                            viewMode: 2,
                            autoCropArea: 1,
                        });
                    });
                };
                reader.readAsDataURL(file);
            },

            cropImage() {
                const canvas = this.cropper.getCroppedCanvas({
                    width: 1200,
                    height: 675,
                });
                this.croppedPreview = canvas.toDataURL('image/jpeg', 0.9);
                document.getElementById('cropped-image-input').value = this.croppedPreview;
                this.showCropper = false;
                this.cropper.destroy();
                this.cropper = null;
            },

            cancelCrop() {
                this.showCropper = false;
                if (this.cropper) {
                    this.cropper.destroy();
                    this.cropper = null;
                }
            },

            removeImage() {
                this.croppedPreview = null;
                document.getElementById('cropped-image-input').value = '';
            }
        };
    }

    // No extra form submission sync needed for TinyMCE when using textarea + editor.save()
</script>
@endpush
