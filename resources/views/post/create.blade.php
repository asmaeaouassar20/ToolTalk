<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                    <!-- Title -->
                    <div>
                        <x-input-label for="title" :value="__('messages.title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title')"   />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                     <!-- image -->
                    <div class="mt-4">
                        <x-input-label for="image" :value="__('messages.image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                            :value="old('image')"   />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('messages.selectCateg')" />
                        <x-select-category />
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                     <!-- Link -->
                    <div class="mt-4">
                        <x-input-label for="link" :value="__('messages.link')" />                        
                        <x-text-input id="link" class="block mt-1 w-full" type="text" name="link"
                            :value="old('link')"   />
                        <x-input-error :messages="$errors->get('link')" class="mt-2" />
                    </div>

                     <!-- Content -->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('messages.content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full"  name="content">
                            {{ old('content') }}
                        </x-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4">{{ __('messages.submit') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>