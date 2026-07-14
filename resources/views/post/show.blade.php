<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>

                <!-- User Avatar -->
                <div class="flex gap-4">
                   <x-user-avatar :user="$post->user" size="w-12 h-12" />
                </div>

                <div>
                    <x-follow-button-alpine :user="$post->user" class="flex gap-2">                                        
                        <a class="hover:underline" href="{{ route('profile.show' , $post->user) }}">{{ $post->user->name }}</a>
                        &middot;
                        <button 
                        :class="following ? 'text-red-500':'text-emerald-500' " 
                        x-text="following ? 'Unfollow' : 'Follow' "
                        @click="follow()"
                        >Follow</button>
                    </x-follow-button-alpine>


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