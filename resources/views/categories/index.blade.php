@extends('layouts.dashboard')
@section('title', 'Categories Management')
@section('content')

    <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!--Container-->
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

        <!--Title-->
        <div class="flex justify-between">
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                CATEGORIES
            </h1>
            <button class="justify-end">
                <a href="{{route('categories.create')}}"
                   class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Category</a>
            </button>

        </div>
        <div class="Category p-8 mt-6 lg:mt-0 rounded shadow bg-white">


            <table class="category stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                <tr>
                    <th data-priority="1" class="text-center">ID</th>
                    <th data-priority="2" class="text-left">Parent Category</th>
                    <th data-priority="3" class="text-left">Child Category</th>
                    <th data-priority="4" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @foreach ($category->options as $option)
                                {{ $option->name }}<br>
                            @endforeach
                        </td>
                        <td class="py-3 px-6 content-center mt-6 text-center flex justify-center">
                            <div class="flex item-center ">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </body>
    <div class="right-0 justify-end mt-6 flex mr-6"
         x-data="{show:true}"
         x-init="setTimeout(()=> show=false,4000)"
         x-show="show">
        @if(session()->has('success'))
            <h1 class="text-center text-md justify-end border rounded-lg text-gray-100 bg-green-400 px-3 py-3 max-w-sm text-xl">
                {{session()->get('success')}}
            </h1>
        @endif
    </div>
@endsection
