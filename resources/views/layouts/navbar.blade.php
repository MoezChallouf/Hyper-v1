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
                    HyperOptima
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
                                    <a href="/register" class="text-xs font-bold uppercase ">Register</a>
                                    {{--                                    <a href="/login" class="text-xs font-bold uppercase ml-2 ">Login</a>--}}
                                @endauth
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @auth
        <div class="hidden bg-gray-700 md:block md:border-b">
            <div class="container mx-auto px-4">
                <div class="md:flex">
                    <div class="flex -mb-px mr-8">
                        <a href="{{route('products.index')}}"
                           class="no-underline text-white md:text-blue-dark flex items-center py-4 border-b border-blue-dark">
                            <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                      d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z"/>
                            </svg>
                            Products
                        </a>
                    </div>
                    <div class="flex -mb-px mr-8">
                        <a href="{{route('partners.index')}}"
                           class="no-underline text-white opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-grey-dark">
                            <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path d="M8 7h10V5l4 3.5-4 3.5v-2H8V7zm-6 8.5L6 12v2h10v3H6v2l-4-3.5z"
                                      fill-rule="nonzero"/>
                            </svg>
                            Partners
                        </a>
                    </div>
                    <div class="flex -mb-px mr-8">
                        <a href="{{route('categories.index')}}"
                           class="no-underline text-white opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-grey-dark">
                            <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M18 8H5.5v-.5l11-.88v.88H18V6c0-1.1-.891-1.872-1.979-1.717L5.98 5.717C4.891 5.873 4 6.9 4 8v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-1.5 7.006a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"
                                    fill-rule="nonzero"/>
                            </svg>
                            Categories
                        </a>
                    </div>
                    <div class="flex -mb-px">
                        <a href="#"
                           class="no-underline text-white opacity-50 md:text-grey-dark md:opacity-100 flex items-center py-4 border-b border-transparent hover:opacity-100 md:hover:border-grey-dark">
                            <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M18.783 12c0-1.049.646-1.875 1.617-2.443a8.932 8.932 0 0 0-.692-1.672c-1.089.285-1.97-.141-2.711-.883-.741-.74-.968-1.621-.683-2.711a8.732 8.732 0 0 0-1.672-.691c-.568.97-1.595 1.615-2.642 1.615-1.048 0-2.074-.645-2.643-1.615-.58.172-1.14.403-1.671.691.285 1.09.059 1.971-.684 2.711-.74.742-1.621 1.168-2.711.883A8.797 8.797 0 0 0 3.6 9.557c.97.568 1.615 1.394 1.615 2.443 0 1.047-.645 2.074-1.615 2.643.173.58.404 1.14.691 1.672 1.09-.285 1.971-.059 2.711.682.741.742.969 1.623.684 2.711.532.288 1.092.52 1.672.693.568-.973 1.595-1.617 2.643-1.617 1.047 0 2.074.645 2.643 1.617a8.963 8.963 0 0 0 1.672-.693c-.285-1.088-.059-1.969.683-2.711.741-.74 1.622-1.166 2.711-.883.287-.532.52-1.092.692-1.672-.973-.569-1.619-1.395-1.619-2.442zM12 15.652a3.653 3.653 0 1 1 0-7.306 3.653 3.653 0 0 1 0 7.306z"
                                    fill-rule="nonzero"/>
                            </svg>
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest()
        @include('sessions.create')
    @endguest

</div>
