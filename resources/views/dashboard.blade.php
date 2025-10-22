<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-100 dark:bg-green-800 border border-green-400 text-green-700 dark:text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline font-semibold text-white">
                    {{ session('success') }}
                </span>
                <!-- Optional: Close Button for the alert -->
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500 dark:text-green-300" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.414l-2.651 2.65a1.2 1.2 0 1 1-1.697-1.697l2.758-2.758-2.758-2.758a1.2 1.2 0 1 1 1.697-1.697L10 8.586l2.651-2.651a1.2 1.2 0 1 1 1.697 1.697L11.414 10l2.758 2.758a1.2 1.2 0 0 1 0 1.691z"/></svg>
                </span>
            </div>
        </div>
    @endif

            <x-articles :articles="$articles"></x-articles>
    </div>
</x-app-layout>
