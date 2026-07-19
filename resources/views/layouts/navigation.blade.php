<nav x-data="{ open: false }" class="bg-gray-200 shadow-xl  fixed top-0 left-0 right-0  py-3  border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
            </div>

            <div class="flex">
                @auth
                    <a href="{{ route('profile.myposts') }}" class="flex items-center mr-5">
                        <x-primary-button type="create-post">{{ __('messages.myposts')  }}</x-primary-button>
                    </a>
                    <a href="{{ route('post.create') }}" class="flex items-center">
                        <x-primary-button type="create-post">{{ __('messages.createPost')  }}</x-primary-button>
                    </a>
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('register') }}">
                        <x-custom-button type="register">{{ __('messages.register') }}</x-custom-button>
                    </a>
                    <a href="{{ route('login') }}">
                        <x-custom-button type="login">{{ __('messages.login') }}</x-custom-button>
                    </a>
                @endguest
                <script>
                    function choisirLangue(langue) {
                        const baseUrl = "{{ Storage::url('lang/') }}";
                        document.getElementById('locale-main').src = baseUrl + langue + '.jpg';
                        document.getElementById('options-local-lang').style.visibility = 'hidden';
                        const a = document.createElement('a');
                        if (langue == 'en') {
                            a.href = "{{ route('lang.switch', 'en') }}";
                        }
                        if (langue == 'fr') {
                            a.href = "{{ route('lang.switch', 'fr') }}";
                        }
                        a.click();
                    }

                </script>
                <div class="app-lang ms-5 mb-2">
                    <div id="logo-langue-app" class="h-full">
                        @if (session()->has('locale'))
                            <img id="locale-main" src="{{ Storage::url('lang/' . session()->get('locale') . '.jpg') }}"
                                alt="logo locale lang" class="mt-2" />
                        @else
                            <img id="locale-main" src="{{ Storage::url('lang/en.jpg') }}" alt="logo locale lang"
                                class="mt-2" />
                        @endif
                    </div>
                    <div id="options-local-lang">
                        <span onclick="choisirLangue('en')"><img src="{{ Storage::url('lang/en.jpg') }}"
                                alt="logo locale lang" class="mt-2" /></span>
                        <span onclick="choisirLangue('fr')"><img src="{{ Storage::url('lang/fr.jpg') }}"
                                alt="logo locale lang" class="mt-2" /></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @auth
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('messages.profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('messages.quit') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>