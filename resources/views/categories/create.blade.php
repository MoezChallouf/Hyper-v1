{{--@extends('layouts.dashboard')--}}
{{--@section('title', 'Categories Management')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1 class="text-left">Create Category</h1>--}}
{{--        <form method="POST" action="{{ route('categories.store') }}">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                <label for="name">Category Name</label>--}}
{{--                <input type="text" name="name" class="form-control" required>--}}
{{--            </div>--}}
{{--            <div class="form-group" id="options">--}}
{{--                <label for="option">Options</label>--}}
{{--                <div class="input-group mb-3">--}}
{{--                    <input type="text" name="options[]" class="form-control" required>--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-outline-secondary" type="button" onclick="addOption()">Add Option--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">Create Category</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


</head>
<body>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div>
        <label for="name" class="block mb-2 text-md font-bold text-black-700 ">Parent Category</label>
        <input type="text" id="name" name="name"
               class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
               placeholder="Category Name"
               value="{{old('name')}}"
               required>
        @error('name')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
        </p>
        @enderror
    </div>


    <div class="form-group" x-data="{ options: [] }">
        <label for="option" class="block mb-2 text-md font-bold text-black-700">Child Category</label>
        <div x-show="options.length > 0">
            <template x-for="(option, index) in options" :key="index">
                <div class="input-group mb-3">
                    <input
                        type="text"
                        x-model="option"
                        :name="'options[' + index + ']'"
                        class="option-input border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5"
                        required
                        placeholder="Category Options"
                    >
                </div>
            </template>
        </div>
        <div class="input-group-append">
            <button
                class="border-2 font-semibold text-gray-500 border-indigo-500 btn flex hover:bg-indigo-500 hover:text-white px-2 rounded"
                type="button"
                @click="options.push('')"
            >
                Add Option
            </button>
        </div>
    </div>


</form>
</body>

</html>

