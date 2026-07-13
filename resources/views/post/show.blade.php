<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>

                <!-- User Avatar -->
                <div class="flex gap-4">
                    @if($post->user->image)
                        <img src="{{ $post->user->imageUrl()}}" alt="user image" class="w-12 h-12 rounded-full" />
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($post->$user->name) }}" alt="user avatar"
                            class="w-12 h-12 rounded-full" />
                    @endif
                </div>

                <div>
                    <div class="flex gap-2">
                        <h3>{{ $post->user->name }}</h3>
                        &middot;
                        <a href="#" class="text-emerald-500">Follow</a>
                    </div>


                    <div class="flex gap-2 text-gray-500 text-sm">
                        {{ $post->readTime() }} min read
                        &middot;
                        {{ $post->created_at->format('M d, Y') }}
                    </div>

                    <!-- Clap section -->
                        <x-like-button />
                    

                    <!-- post content -->
                    <div class="mt-8">
                        <img src="{{ $post->imageUrl() }}" alt="post's image " class="w-full" />
                        <div class="mt-4">
                            {{ $post->content }}
                        </div>
                    </div>
                    <div class="mt-5">
                        <span class="px-4 py-2 bg-gray-200 rounded-2xl">{{ $post->category->name }}</span>
                    </div>
                </div>
                <x-like-button />

            </div>

        </div>

    </div>
</x-app-layout>