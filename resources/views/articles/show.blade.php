<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 p-6 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">

                <div class="flex justify-between items-center mb-2">
                    <!-- The title now has no bottom margin (mb-2 removed) as the flex container handles spacing -->
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        <a href="" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                            {{ $article->title }}
                        </a>
                    </h1>

                    @if ($article->user_id === auth()->user()->id)
                         <!-- The button is now aligned to the right -->
                    <x-secondary-button>
                        <a href="{{ route('articles.edit', $article->id) }}" type="button"
                            class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-3 py-1.5
                              dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none transition duration-150 me">
                            EDIT
                        </a>
                    </x-secondary-button>

                    {{-- <x-secondary-button>
                        <a href="{{ route('articles.edit', $article->id) }}" type="button"
                            class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-3 py-1.5
                              dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none transition duration-150 me">
                           DELETE
                        </a>
                    </x-secondary-button> --}}

                    @endif
                </div>


                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                    Category:
                    <span class="font-medium text-indigo-600 dark:text-indigo-400">
                        {{ $article->category->name ?? 'Uncategorized' }}
                    </span>
                    | Posted on: {{ $article->created_at->format('M d, Y') }}
                </p>

                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    {{ $article->full_text }}
                </p>

                <button onclick="window.history.back()" type="button"
                    class="mb-4 text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5
                           dark:bg-gray-700 **dark:text-gray-200** dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:border-gray-600 dark:focus:ring-gray-700 inline-flex items-center">
                    <!-- Icon: Arrow Left -->
                    <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Go Back
                </button>
            </div>
        </div>

    </div>
</x-app-layout>
