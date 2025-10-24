<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 p-2 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">

                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
                    Edit Category
                </h1>

                <form method="POST" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <!-- Title -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$category->name)"  autofocus />
                         <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <x-primary-button class=" mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>

                    <button onclick="window.history.back()" type="button"
                    class="mt-4 text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5
                           dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:border-gray-600 dark:focus:ring-gray-700 inline-flex items-center">
                    <!-- Icon: Arrow Left -->
                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Go Back
                </button>
                </form>


        </div>
    </div>

</x-app-layout>
