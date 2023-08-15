<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<form class="flex justify-center my-32" method="POST" action="/login">
    @csrf
    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">Login</h2>

            <form class="mx-auto max-w-lg rounded-lg border">
                <div class="flex flex-col gap-4 p-4 md:p-8">
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
                        Log in
                    </button>

                </div>

                <div class="flex items-center justify-center bg-gray-100 p-4">
                    <p class="text-center text-sm text-gray-500">Don't have an account? <a href="/register"
                                                                                           class="text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</form>
