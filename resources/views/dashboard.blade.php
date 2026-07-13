<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select your country</label>
                        <select id="tabs"
                            class="block w-full px-3 py-4 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-4 shadow-xs placeholder:text-body">
                            <option>Profile</option>
                            <option>Dashboard</option>
                            <option>setting</option>
                            <option>Invoice</option>
                        </select>
                    </div>
                    <ul class="hidden text-sm font-medium text-center text-body sm:flex -space-x-px">

                        <li class="w-full focus-within:z-10">
                            <a href="#"
                                class="inline-block w-full text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-secondary-strong font-medium leading-5 text-sm px-4 py-4 focus:outline-none">
                                all
                            </a>
                        </li>

                        @foreach ($categories as $category)
                            <li class="w-full focus-within:z-10">
                                <a href="#"
                                    class="inline-block w-full text-body bg-neutral-primary-soft border border-default rounded-e-base hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-secondary-strong font-medium leading-5 text-sm px-4 py-4 focus:outline-none">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse($posts as $post)
                        <a href="#"
                            class="flex flex-col items-center bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs md:flex-row md:max-w-xl md:flex-row md:max-w-xl">
                            <img class="object-cover w-full rounded-base h-64 md:h-auto md:w-48 mb-4 md:mb-0"
                                src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="">
                            <div class="flex flex-col justify-between md:p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">
                                    {{ $post->title }}
                                </h5>
                                <p class="mb-6 text-body">
                                    {{ Str::words($post->content,20) }}
                                </p>
                                <div>
                                    <button type="button"
                                        class="inline-flex items-center w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                        Read more
                                        <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </a>

                    @empty     
                    <div>
                        <p class="text-gray-900">No posts found</p>
                    </div>
                    @endforelse
                </div>
                {{ $posts->links() }}
            </div>
        </div>

    </div>
</x-app-layout>