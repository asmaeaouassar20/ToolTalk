<div>


    <form method="post" action="{{ route('create.comment' , $post) }}" class="p-2 flex items-center justify-start">
        <span
            class="w-[60%] px-4 flex items-center justfy-center gap-1 text-gray-500 border border-gray-300 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
            </svg>
            <input class="w-[100%] p-1 border-0 rounded-lg focus:outline-none focus:border-none focus:ring-0 " name="comment" type="text"
                placeholder="{{ __('messages.comment') }}" />
        </span>

        <button class="px-2 md:px-4 py-1 ml-1 bg-emerald-100 rounded cursor-pointer hover:bg-emerald-300" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
            </svg>
        </button>
        <span class="text-gray-800 ms-1 md:ms-12 bg-gray-100 py-1 px-4 rounded-lg cursor-pointer">{{ __('messages.comments') }}&nbsp (12)</span>
    </form>
    <span class="text-[13px] ms-3 text-red-400">@error('comment') {{ $message }} @enderror</span>
</div>