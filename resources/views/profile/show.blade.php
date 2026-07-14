@props(['user'])

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">

                    <!-- Post content -->
                    <div class="flex-1 pr-8">
                        <h1 class="text-5xl">{{ $user->name }}</h1>
                        <div class="mt-8">
                            @forelse($posts as $p)
                                <x-post-item :post="$p" />
                            @empty
                                <div>
                                    <p class="text-gray-900">No posts found</p>
                                </div>
                            @endforelse
                            {{ $posts->links() }}
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <!-- alpine component  -->
                    <x-follow-button-alpine :user="$user" >
                        <x-user-avatar :user="$user" size="w-20 h-20" />
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500" > <span x-text="followersCount"></span> followers</p>
                        <p>
                            {{ $user->bio }}
                        </p>
                        @if(auth()->user() && auth()->user()->id !== $user->id)
                            <div class="mt-4">
                                <button 
                                   @click = "follow()"
                                    class=" rounded-xl px-4 py-2 text-white mt-4"
                                    x-text="following ? 'Unfollow' : 'Follow' "
                                    :class="following ? 'bg-red-600' : 'bg-emerald-600' "
                                >                                    
                                </button>
                            </div>
                        @endif
                   </x-follow-button-alpine>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>