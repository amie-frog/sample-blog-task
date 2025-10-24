<x-app-layout>
    <div class="py-12">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6">
                    <form action="" method="get">
                        @csrf
                        <div class="flex items-center space-x-4">


                            <!-- input ကို id ပေးလိုက်တာက label အတွက် အထောက်အကူဖြစ်စေပါတယ် -->
                            <x-text-input id="search_query" name="search" type="text" class="w-full sm:w-80 ms-3"
                                placeholder="Search category by name" />
                            <x-primary-button for="search_query"> Search </x-primary-button>
                        </div>
                    </form>
                </div>
               <div class="p-6">
                      {{-- START: MODIFIED SECTION --}}
                      <div class="flex items-center justify-between">

                          {{-- Categories list (H1) - will be on the left --}}
                          <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Categories list</h1>

                          {{-- Create New Category Button - will be on the right --}}
                          <x-primary-button>
                             {{-- Removed ml-auto as justify-between handles the spacing --}}
                             <a href="{{ route('categories.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Create New Category
                            </a>
                          </x-primary-button>

                      </div>
                      {{-- END: MODIFIED SECTION --}}
                </div>
               @foreach ($categories as $category)
                    {{-- 1. Create a single container with Flexbox for the row --}}
                    <div class="mb-4 p-6 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg flex items-center justify-between">

                        {{-- LEFT SIDE: Category Name and Details (Grouped) --}}
                        <div class="flex flex-col flex-grow">

                            {{-- Category Name (H1) --}}
                            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                <a href="" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                                    {{ $category->name }}
                                </a>
                            </h1>

                            {{-- Posted Date (P) --}}
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                | Posted on: {{ $category->created_at->format('M d, Y') }}
                            </p>
                        </div>

                        {{-- RIGHT SIDE: Action Buttons (Grouped) --}}
                        <div class="flex items-center space-x-2">

                            <x-secondary-button>
                                <a href="{{ route('categories.edit', $category->id) }}" class="p-0">
                                    EDIT
                                </a>
                            </x-secondary-button>

                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete the category: {{ $category->name }}?');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>
                                    DELETE
                                </x-danger-button>
                            </form>
                        </div>

                    </div>
                @endforeach

                <div class="mt-10">
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
