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
    @include('layouts.navbar')
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

        var table = $('.myDataTablee').DataTable({
            pageLength: 5,
            responsive: true
        })
            .columns.adjust()
            .responsive.recalc();
    });
</script>


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
