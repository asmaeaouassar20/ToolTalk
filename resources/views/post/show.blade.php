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
                        <a class="hover:underline"
                            href="{{ route('profile.show', $post->user) }}">{{ $post->user->name }}</a>
                        @auth
                            &middot;
                            <button :class="following ? 'text-red-500':'text-emerald-500' "
                                x-text="following ? 'Unfollow' : 'Follow' " @click="follow()">
                                Follow
                            </button>
                        @endauth
                    </x-follow-button-alpine>


                    <div class="flex gap-2 text-gray-500 text-sm">
                        {{ $post->readTime() }} min read
                        &middot;
                        {{ $post->created_at->format('M d, Y') }}
                    </div>

                    <!-- Reaction section -->
                    <div class="flex gap-12 mt-8 border-t border-b p-4">
                        <x-like-button :post="$post" />
                        <x-comment-button :post="$post" />
                    </div>


                    <!-- post content -->
                    <div class="mt-8 flex flex-col md:flex-row">
                        <img src="{{ $post->imageUrl() }}" alt="post's image " class=" w-1/2 h-96" />
                        <div class="mt-4 mx-8 text-justify">
                            {{ $post->content }}
                        </div>
                    </div>
                    <div class="mt-8">
                        <span class="px-4 py-2 bg-gray-200 rounded-2xl">{{ $post->category->name }}</span>
                    </div>
                </div>

                <!-- Reaction section -->
                <div class="flex gap-12 mt-8 border-t border-b p-4">
                    <x-like-button :post="$post" />
                    <x-comment-button :post="$post" />
                </div>


                <div class="mt-5"> 
                    @foreach ($post->comments as $comment )
                        <div class="mb-5 flex gap-5 bg-gray-100 p-4">
                            <div class="flex flex-col items-center justify-center">
                                <img class="w-16 h-16 rounded-full" src={{ Storage::url($comment->user->image) }} alt="user photo" />
                                <a href={{ route('profile.show' , $post->user->username) }} class="text-sm hover:underline cursor-pointer">{{ $comment->user->name }}</a>
                            </div>
                            <div>
                                {{ $comment->comment }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</x-app-layout>