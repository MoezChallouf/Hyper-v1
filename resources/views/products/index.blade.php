@extends('layouts.dashboard')
@section('title', 'Products Management')
@section('content')

    <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal justify-center mx-auto ml-1.5">

    <div class="container w-full justify-center mx-auto px-2">

        <div class="flex justify-between">
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                Products
            </h1>
            <button class="justify-end" id="openAddProductModal">
                <a href="{{route('products.create')}}"
                   class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Product</a>
            </button>

        </div>


        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                <tr>
                    <th data-priority="1" class="text-center">ID</th>
                    <th data-priority="2" class="text-left">Product Name</th>
                    <th data-priority="3" class="text-left">Price</th>
                    <th data-priority="4" class="text-center">Quantity</th>
                    <th data-priority="5" class="text-center">Status</th>
                    <th data-priority="6" class="text-center">Matter</th>
                    <th data-priority="7" class="text-center">Color</th>
                    <th data-priority="8" class="text-center">Discount</th>
                    <th data-priority="9" class="text-center">Description</th>
                    <th data-priority="10" class="text-left">Category</th>
                    <th data-priority="11" class="text-left">SousCategory</th>
                    <th data-priority="12" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)
                    <tr>
                        <td class="text-center">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} TND</td>
                        <td class="text-center">{{ $product->quantity }}</td>

                        <td class="px-6 py-3 text-center">
                        <span class="py-1 px-3 rounded-full text-xs
                        @if($product->status === 'Epuise')
                         bg-red-300 text-black-500 @else bg-green-300 text-black-500
                        @endif">
                         {{ $product->status }}
                        </span>
                        </td>

                        <td class="text-center">{{ $product->matter}}</td>
                        <td class="text-center">{{ $product->color}}</td>
                        <td class="text-center">{{ $product->discount}} %</td>
                        <td class="text-center"> {{ $product->description}}</td>
                        <td class="text-left">
                            {{ $product->category->name }}
                        </td>

                        <!-- ... other HTML code for displaying product data ... -->
                        <td class="text-center">
                            @foreach ($product->category->options as $option)
                                <p class="text-left">
                                    {{ $option->name }}
                                </p>
                            @endforeach
                        </td>


                        <td class="py-3 px-6 content-center mt-6 text-center flex justify-center">
                            <div class="flex item-center ">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('products.show', $product->id) }}"
                                   class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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

    {{--    </body>--}}
    <script>
        // Get the modal element
        const addProductModal = document.getElementById('addProductModal');
        // Get the button that opens the modal
        const openAddProductModal = document.getElementById('openAddProductModal');
        // Get the button that closes the modal
        const closeAddProductModal = document.getElementById('closeAddProductModal');

        // Function to open the modal
        function openModal() {
            addProductModal.classList.remove('hidden');
            document.body.classList.add('modal-open');
        }

        // Function to close the modal
        function closeModal() {
            addProductModal.classList.add('hidden');
            document.body.classList.remove('modal-open');
        }

        // Event listener to open the modal when the "Add Product" button is clicked
        openAddProductModal.addEventListener('click', openModal);

        // Event listener to close the modal when the "Cancel" button is clicked
        closeAddProductModal.addEventListener('click', closeModal);

    </script>

@endsection
