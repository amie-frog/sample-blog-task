<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 p-6 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">

                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
                    Create New Article
                </h1>

                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />

                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"   :value="old('title', $article->title)" autofocus />
                         <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Full Text -->
                    <div class="mt-4">
                        <x-input-label for="full_text" :value="__('Full Text')" />

                        <x-textarea-input id="full_text" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 " name="full_text" >
                            {{ old('full_text', $article->full_text) }}
                        </x-textarea-input>
                         <x-input-error :messages="$errors->get('full_text')" class="mt-2" />
                    </div>

                    <!-- choose category -->
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />

                        <select id="category" name="categories_id" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('categories_id',$article->categories_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                         <x-input-error :messages="$errors->get('categories_id')" class="mt-2" />
                    </div>

                  <!-- image -->
                    <div class="mt-4 mb-4">
                        <x-input-label for="image" :value="__('Image')" />

                        <!-- Existing image preview (only if image exists) -->
                        <div id="old-image-container" class="{{ !empty($article->image) ? '' : 'hidden' }} mb-2">
                            <img src="{{ !empty($article->image) ? asset('storage/' . $article->image) : '' }}"
                                alt="Article Image"
                                class="w-20 h-20 object-cover rounded-md border border-gray-300 dark:border-gray-700">
                        </div>

                        <!-- New image preview (hidden initially) -->
                        <div id="new-preview-container" class="hidden mb-2">
                            <img id="new-preview"
                                class="w-20 h-20 object-cover rounded-md border border-gray-300 dark:border-gray-700">
                        </div>

                        <!-- File input -->
                        <x-file-input id="image"
                                    class="block mt-1 w-full"
                                    type="file"
                                    name="image"
                                    accept="image/*"
                                    onchange="previewImage(event)" />

                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button class=" mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>

                    <x-nav-link class="ms-4 mt-4" :href="route('dashboard')">
                        {{ __('Back') }}
                    </x-nav-link>
                </form>
        </div>
    </div>
<script>
function previewImage(event) {
    const input = event.target;
    const oldImageContainer = document.getElementById('old-image-container');
    const newPreviewContainer = document.getElementById('new-preview-container');
    const newPreview = document.getElementById('new-preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            // Hide old image if any
            if (oldImageContainer) {
                oldImageContainer.classList.add('hidden');
            }

            // Show new preview
            newPreview.src = e.target.result;
            newPreviewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        // No file selected → restore old image (if any)
        if (oldImageContainer) {
            oldImageContainer.classList.remove('hidden');
        }
        newPreviewContainer.classList.add('hidden');
    }
}
</script>

</x-app-layout>

