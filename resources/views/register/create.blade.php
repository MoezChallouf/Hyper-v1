<div>
    <div class="bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="flex items-center md:justify-between py-4">
                <div class="w-1/4 md:hidden">
                    <svg class="fill-current text-white h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <path
                            d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z"/>
                    </svg>
                </div>
                <div class="w-1/2 md:w-auto text-center text-gray-700 text-2xl font-medium">
                    HyperGroup
                </div>
                <div class="w-1/4 md:w-auto md:flex text-right">
                    <div class="mt-8 md:mt-0">
                        @auth
                            <div x-data="{ isOpen: false }" class="relative ml-3">
                                <div>
                                    <button @click="isOpen = !isOpen" type="button"
                                            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                            id="user-menu-button" :aria-expanded="isOpen" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                             alt="">
                                    </button>
                                </div>

                                <div x-show="isOpen"
                                     @click.away="isOpen = false"
                                     x-transition:enter="transition ease-out duration-100 transform opacity-0 scale-95"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75 transform opacity-100 scale-100"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                     role="menu" aria-orientation="vertical"
                                     :aria-labelledby="isOpen ? 'user-menu-button' : ''" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="text-left block px-4 py-2 text-sm text-gray-700"
                                       role="menuitem"
                                       tabindex="-1"
                                       id="user-menu-item-0">Your Profile</a>
                                    <a href="#" class="text-left block px-4 py-2 text-sm text-gray-700"
                                       role="menuitem"
                                       tabindex="-1"
                                       id="user-menu-item-1">Settings</a>
                                    <form
                                        class="text-left block px-4 py-2 text-sm text-gray-700"
                                        method="POST" action="/logout">
                                        @csrf
                                        <button
                                            type="submit">LogOut
                                        </button>
                                    </form>
                                </div>
                                @else
                                    <a href="/" class="text-xs font-bold uppercase ">Login</a>
                                @endauth
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<form class="flex justify-center my-32" method="POST" action="/register">
    @csrf
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">Register</h2>

            <form class="mx-auto max-w-lg rounded-lg border">
                <div class="flex flex-col gap-4 p-4 md:p-8">
                    <div>
                        <label for="name" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{old('name')}}"
                               required
                               class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"/>
                    </div>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1 px-1">{{$message}}</p>
                    @enderror
                    <div>
                        <label for="username" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">User
                            Name</label>
                        <input type="text"
                               name="username"
                               id="username"
                               value="{{old('username')}}"
                               required
                               class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"/>
                    </div>
                    @error('username')
                    <p class="text-red-500 text-xs mt-1 px-1">{{$message}}</p>
                    @enderror
                    <div>
                        <label for="email" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Email</label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{old('email')}}"
                               required
                               class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"/>
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1 px-1">{{$message}}</p>
                    @enderror

                    <div>
                        <label for="password"
                               class="mb-2 inline-block text-sm text-gray-800 sm:text-base">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               value="{{old('password')}}"
                               required
                               class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"/>
                    </div>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1 px-1">{{$message}}</p>
                    @enderror

                    <button
                        class="block rounded-lg bg-gray-800 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-gray-300 transition duration-100 hover:bg-gray-700 focus-visible:ring active:bg-gray-600 md:text-base">
                        Register
                    </button>

                </div>

                <div class="flex items-center justify-center bg-gray-100 p-4">
                    <p class="text-center text-sm text-gray-500">Already have an account?
                        <a href="/login"
                           class="text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">
                            Login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</form>
