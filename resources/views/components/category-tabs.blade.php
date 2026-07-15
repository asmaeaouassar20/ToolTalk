 <div class="p-6 text-gray-900 text-center">   
                        @if(count($categories))

                    <ul class="hidden text-sm font-medium text-center text-body sm:flex -space-x-px">
                        <li class="w-full focus-within:z-10">
                            <a href="/"
                                class="{{ request('category') ? '' : 'bg-gray-600 text-white' }} w-full h-full flex items-center justify-center text-body bg-neutral-primary-soft border border-default hover:bg-neutral-secondary-medium hover:text-heading focus:ring-4 focus:ring-neutral-secondary-strong font-medium leading-5 text-sm px-4 py-4 focus:outline-none">
                                all
                            </a>
                        </li>

                        @foreach ($categories as $category)
                            <li class="w-full  focus-within:z-10">
                                <a href="{{ route('post.byCategory' , $category) }}"

                                    class="{{ Route::currentRouteNamed('post.byCategory')  && request('category') && request('category')->id ==$category->id ? 'bg-gray-600 text-white' : ''  }} flex items-center justify-center w-full  h-full  text-body  border border-default rounded-e-base focus:ring-4 focus:ring-neutral-secondary-strong font-medium leading-5 text-sm px-4 py-4 hover:bg-gray-200 hover:text-gray-900">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                      
                    </ul>
                    @else  
                     
                    {{ $slot }}
                        @endif     

                </div>