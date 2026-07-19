@props(['show' => false])
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div x-data="{
                showComments : {{ $show }},
                displayComments(){
                    this.showComments=!this.showComments;
                }
            }" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
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




                    <!-- post content -->
                    <div class="mt-8 flex flex-col md:flex-row">
                        <img src="{{ $post->imageUrl() }}" alt="post's image " class=" w-1/3 max-h-96" />
                        <div class="mt-4 mx-8 text-justify">
                            {{ $post->content }}
                            <div class="mt-8">
                                <a href="{{ $post->link}}" class="underline flex items-center justify-start gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                    </svg>

                                    {{ $post->link }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12">
                        <span class="px-4 py-2 bg-gray-200 rounded-2xl">{{ $post->category->name }}</span>
                    </div>
                </div>

                <!-- Reaction section -->
                @auth
                    <div class="flex gap-12 mt-8 border-t border-b p-4">
                        <x-like-button :post="$post" />
                        <div @click="displayComments()"><x-comment-button :post="$post" /></div>
                    </div>
                @endauth


                <template x-if="showComments">
                    <div class="mt-5">
                        @foreach ($post->comments as $comment)
                            <div class="mb-5 flex gap-5 bg-gray-100 p-4">
                                <div class="flex flex-col items-center justify-center">
                                    <img class="w-16 h-16 rounded-full" src={{ Storage::url($comment->user->image) }}
                                        alt="user photo" />
                                    <a href={{ route('profile.show', $post->user->username) }}
                                        class="text-sm hover:underline cursor-pointer">{{ $comment->user->name }}</a>
                                </div>
                                <div>
                                    {{ $comment->comment }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </template>

            </div>


        </div>

    </div>
</x-app-layout>