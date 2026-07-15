<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <x-category-tabs> No catrgories</x-category-tabs>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse($posts as $p)
                       <x-post-item :post="$p" />
                    @empty     
                    <div>
                        <p class="text-gray-900 text-center">No posts found</p>
                    </div>
                    @endforelse
                      {{ $posts->links() }}
                </div>              
            </div>
        </div>

    </div>
</x-app-layout>