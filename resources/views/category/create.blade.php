<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 p-2 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">

                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
                    Create New Categories
                </h1>

                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus />
                         <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <x-primary-button class=" mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </form>
        </div>
    </div>

</x-app-layout>
