 <div class="p-6 text-gray-900">                       
                    <ul class="hidden text-sm font-medium text-center text-body sm:flex -space-x-px">

                        <li class="w-full focus-within:z-10">
                            <a href="#"
                                class="inline-block w-full text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-secondary-strong font-medium leading-5 text-sm px-4 py-4 focus:outline-none">
                                all
                            </a>
                        </li>

                        @forelse ($categories as $category)
                            <li class="w-full focus-within:z-10">
                                <a href="#"
                                    class="inline-block w-full text-body bg-neutral-primary-soft border border-default rounded-e-base hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-secondary-strong font-medium leading-5 text-sm px-4 py-4 focus:outline-none">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @empty     
                        {{ $slot }}
                        @endforelse

                    </ul>
                </div>