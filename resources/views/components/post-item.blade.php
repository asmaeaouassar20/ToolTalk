<div
    class="flex flex-col md:flex-row mb-5  bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs ">
    <img class="object-cover  rounded-base h-64 md:h-auto md:w-48 mb-4 md:mb-0" src="{{ Storage::url($post->image) }}"
        alt="">

    <div class="w-full flex flex-col justify-between md:p-4 leading-normal ml-5">
        <a href="{{ route('post.show',['username' => $post->user->username , 'post' => $post->slug ] ) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">
                {{ $post->title }}
            </h5>
            <p class="mb-6 text-body">
                {{ Str::words($post->content, 20) }}
            </p>
        </a>
        <div>
            <x-primary-button class="mb-4">
                <a href="{{ route('post.show' , ['username' => $post->user->username , 'post' => $post->slug ] ) }}">Read more</a>
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </x-primary-button>
        </div>
    </div>
</div>