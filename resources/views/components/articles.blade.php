<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-8">Latest Blog Articles</h1>
            </div>

            @foreach ($articles as $article)
                <div class="mb-8 p-6 bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg">

                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
                        <a href="" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                            {{ $article->title }}
                        </a>
                    </h1>

                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        Category:
                        <span class="font-medium text-indigo-600 dark:text-indigo-400">
                            {{ $article->category->name ?? 'Uncategorized' }}
                        </span>
                        | Posted on: {{ $article->created_at->format('M d, Y') }}
                    </p>

                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->full_text), 200, '...') }}
                    </p>

                    <a href="{{route('articles.show',$article->id)}}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 font-semibold">
                        Read More &raquo;
                    </a>
                </div>
                <br>
            @endforeach

            <div class="mt-10">
                {{ $articles->links() }}
            </div>

        </div>
    </div>

