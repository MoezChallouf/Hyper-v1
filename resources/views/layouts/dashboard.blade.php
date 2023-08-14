<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet"/>


    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
    </style>
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->


    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <title>Hper - @yield('title')</title>
</head>

<style>
    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a5568;
        /*text-gray-700*/
        padding-left: 1rem;
        /*pl-4*/
        padding-right: 1rem;
        /*pl-4*/
        padding-top: .5rem;
        /*pl-2*/
        padding-bottom: .5rem;
        /*pl-2*/
        line-height: 1.25;
        /*leading-tight*/
        border-width: 2px;
        /*border-2*/
        border-radius: .25rem;
        border-color: #edf2f7;
        /*border-gray-200*/
        background-color: #edf2f7;
        /*bg-gray-200*/
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
        background-color: #ebf4ff;
        /*bg-indigo-100*/
    }

    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #667eea !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #fff !important;
        /*text-white*/
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        /*shadow*/
        font-weight: 700;
        /*font-bold*/
        border-radius: .25rem;
        /*rounded*/
        background: #667eea !important;
        /*bg-indigo-500*/
        border: 1px solid transparent;
        /*border border-transparent*/
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        /*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }

    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before,
    table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
        background-color: #667eea !important;
        /*bg-indigo-500*/
    }

</style>


<body class="h-full">
<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                               aria-current="page">Dashboard</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a>
                            <a href="#"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button"
                                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
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
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-0">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-1">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                   id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>

                    </div>
                </div>
                {{--                <div class="-mr-2 flex md:hidden">--}}
                {{--                    <!-- Mobile menu button -->--}}
                {{--                    <button type="button"--}}
                {{--                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"--}}
                {{--                            aria-controls="mobile-menu" aria-expanded="false">--}}
                {{--                        <span class="absolute -inset-0.5"></span>--}}
                {{--                        <span class="sr-only">Open main menu</span>--}}
                {{--                        <!-- Menu open: "hidden", Menu closed: "block" -->--}}
                {{--                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                {{--                             stroke="currentColor" aria-hidden="true">--}}
                {{--                            <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>--}}
                {{--                        </svg>--}}
                {{--                        <!-- Menu open: "block", Menu closed: "hidden" -->--}}
                {{--                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
                {{--                             stroke="currentColor" aria-hidden="true">--}}
                {{--                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>--}}
                {{--                        </svg>--}}
                {{--                    </button>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--        </div>--}}

                <!-- Mobile menu, show/hide based on menu state. -->
        {{--        <div class="md:hidden" id="mobile-menu">--}}
        {{--            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">--}}
        {{--                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->--}}
        {{--                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"--}}
        {{--                   aria-current="page">Dashboard</a>--}}
        {{--                <a href="#"--}}
        {{--                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>--}}
        {{--                <a href="#"--}}
        {{--                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>--}}
        {{--                <a href="#"--}}
        {{--                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>--}}
        {{--                <a href="#"--}}
        {{--                   class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Reports</a>--}}
        {{--            </div>--}}
        {{--            <div class="border-t border-gray-700 pb-3 pt-4">--}}
        {{--                <div class="flex items-center px-5">--}}
        {{--                    <div class="flex-shrink-0">--}}
        {{--                        <img class="h-10 w-10 rounded-full"--}}
        {{--                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"--}}
        {{--                             alt="">--}}
        {{--                    </div>--}}
        {{--                    <div class="ml-3">--}}
        {{--                        <div class="text-base font-medium leading-none text-white">Tom Cook</div>--}}
        {{--                        <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>--}}
        {{--                    </div>--}}
        {{--                    <button type="button"--}}
        {{--                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">--}}
        {{--                        <span class="absolute -inset-1.5"></span>--}}
        {{--                        <span class="sr-only">View notifications</span>--}}
        {{--                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"--}}
        {{--                             aria-hidden="true">--}}
        {{--                            <path stroke-linecap="round" stroke-linejoin="round"--}}
        {{--                                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"/>--}}
        {{--                        </svg>--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--                <div class="mt-3 space-y-1 px-2">--}}
        {{--                    <a href="#"--}}
        {{--                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your--}}
        {{--                        Profile</a>--}}
        {{--                    <a href="#"--}}
        {{--                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>--}}
        {{--                    <a href="#"--}}
        {{--                       class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign--}}
        {{--                        out</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </nav>


    <div>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">@yield('title')</h1>
            </div>
        </header>
        <main>
            <div>
                @yield('content')
            </div>
        </main>
    </div>
</div>


<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{--<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>--}}
{{--<script>--}}
{{--    const inputElement = document.querySelector('input[type="file"]');--}}
{{--    const pond = FilePond.create(inputElement, {--}}
{{--        name: 'image' // Make sure this matches the name attribute in your form--}}
{{--    });--}}


{{--    FilePond.setOptions({--}}
{{--        server: {--}}
{{--            process: '{{ route("store") }}', // Update to match your named route--}}
{{--            revert: '{{ route("destroy") }}', // Update to match your named route--}}
{{--            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addOptionButton = document.getElementById("addOption");
        const optionFieldsContainer = document.getElementById("optionFields");

        addOptionButton.addEventListener("click", function () {
            const optionInput = document.createElement("div");
            optionInput.className = "flex items-center space-x-2 option-field";
            optionInput.innerHTML = `
                    <input type="text" name="options[]" class="flex-1 mt-1 p-2 border rounded-lg" placeholder="Child Category  ${optionFieldsContainer.children.length + 2}">
                    <button type="button" class="px-4 py-2 text-red-500 font-semibold border rounded-lg hover:bg-red-100 focus:outline-none focus:shadow-outline-red active:bg-red-200 transition duration-300 remove-option">X</button>
                `;

            optionFieldsContainer.appendChild(optionInput);

            // Attach event listener to the newly added close button
            const removeOptionButton = optionInput.querySelector(".remove-option");
            removeOptionButton.addEventListener("click", function () {
                optionInput.remove();
            });
        });
    });
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {

        var table = $('.category').DataTable({
            pageLength: 5,
            responsive: true
        })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
<script>
    $(document).ready(function () {
        var table = $('.myDataTable').DataTable({
            pageLength: 5,
            responsive: true,
            deferLoading: 0,
            processing: true,
            language: {
                'loadingRecords': '&nbsp;',
                'processing': 'Loading...'
            },
            columnDefs: [
                {
                    targets: 8,
                    render: function (data) {
                        var words = data.split(' ').slice(0, 4).join(' ');
                        return words + ' ...';
                    }
                }
                // Add more columnDefs if needed for other columns
            ],
            initComplete: function () {
                // Hide the loading indicator once DataTable is initialized
                $('#loading').hide();
            }
        });

        // Show the loading indicator while DataTable is being initialized
        $('#loading').show();
    });
</script>
<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
</body>
</html>
