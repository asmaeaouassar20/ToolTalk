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
                    <div class="w-[320px] border-l px-8">
                        <x-user-avatar :user="$user" size="w-20 h-20" />
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500">{{ $user->followers()->count() }} followers</p>
                        <p>
                            {{ $user->bio }}
                        </p>
                        <div class="mt-4">
                            <button class="bg-emerald-600 rounded-xl px-4 py-2 text-white mt-4">Follow</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>