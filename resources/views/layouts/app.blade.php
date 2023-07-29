<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Product Management')</title>
    <!-- Add your CSS links or styles here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

<header class="bg-white shadow-sm mb-8 w-full lg:w-5/6">
    <!-- Add your header content here -->
    <nav class="container mx-auto px-4 py-2 w-full lg:w-5/6 mt-auto">
        <a href="{{ route('products.index') }}" class="text-blue-600 font-bold">Product Management</a>
    </nav>
</header>

<main class="container mx-auto py-8">
    @yield('content')
</main>

<footer class="rounded-full text-center py-4">
    <!-- Add your footer content here -->
    &copy; {{ date('Y') }} HyperGroup
</footer>
<!-- Add your JavaScript links or scripts here -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function addOption() {
        var optionsDiv = document.getElementById('options');
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-3');

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'options[]';
        input.classList.add('form-control');
        input.required = true;

        var appendDiv = document.createElement('div');
        appendDiv.classList.add('input-group-append');

        var removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-outline-danger');
        removeButton.textContent = 'Remove';
        removeButton.onclick = function () {
            optionsDiv.removeChild(inputGroup);
        };

        appendDiv.appendChild(removeButton);
        inputGroup.appendChild(input);
        inputGroup.appendChild(appendDiv);
        optionsDiv.appendChild(inputGroup);
    }
</script>
</body>
</html>
