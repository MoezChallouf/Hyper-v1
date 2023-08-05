<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div>
        <label for="name" class="block mb-2 text-md font-bold text-black-700 ">Product Name</label>
        <input type="text" id="name" name="name"
               class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
               placeholder="Product Name"
               value="{{old('name')}}"
               required>
        @error('name')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
        </p>
        @enderror
    </div>

    {{--    --------------------------Problem : Undefined variable: categories (View: C:\MAMP\htdocs\HyperProject\v1\resources\views\products\create.blade.php)-------------------}}

    {{--    <div class="form-group">--}}
    {{--        <label for="category_id" class="block mb-2 text-md font-bold text-black-700">Category</label>--}}
    {{--        <select--}}
    {{--            class="form-control block border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5"--}}
    {{--            id="category_id" name="category_id" required>--}}
    {{--            <option selected disabled>Select Parent Category</option>--}}
    {{--            @foreach($categories as $category)--}}
    {{--                <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
    {{--            @endforeach--}}
    {{--        </select>--}}

    {{--        <label for="option" class="block mb-2 text-md font-bold text-black-700">Child--}}
    {{--            Category</label>--}}
    {{--        <select--}}
    {{--            class="form-control border mt-3 border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5"--}}
    {{--            id="option" name="option" required>--}}
    {{--            <option selected disabled>Select Child Category</option>--}}
    {{--            @foreach($categories as $category)--}}
    {{--                @foreach($category->options as $option)--}}
    {{--                    <option value="{{ $option->id }}">{{ $option->name }}</option>--}}
    {{--                @endforeach--}}
    {{--            @endforeach--}}
    {{--        </select>--}}

    {{--        @error('option')--}}
    {{--        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>--}}
    {{--        </p>--}}
    {{--        @enderror--}}
    {{--    </div>--}}
    <div>
        <label for="price" class="block mb-2 text-md font-bold text-black-700 ">Price</label>
        <input type="text" id="price"
               class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
               placeholder="Price" name="price"
               value="{{old('price')}}"
               required>
        @error('price')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
        </p>
        @enderror
    </div>

    <div class="form-group">
        <label for="status" class="block mb-2 text-md font-bold text-black-700 ">Status</label>
        <select
            class="form-control form-control border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5"
            id="status" required name="status" value="{{old('status')}}">
            <option value="En Stock">En Stock</option>
            <option value="Epuise">Epuise</option>
        </select>
        @error('status')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
        </p>
        @enderror
    </div>
    <div>
        <label for="color" class="block mb-2 text-md font-bold text-black-700 ">Color</label>
        <input type="text" id="color"
               class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
               placeholder="Color"
               value="{{old('color')}}"
               required
               name="color">
        @error('color')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
        </p>
        @enderror
    </div>
    <div>
        <label for="discount" class="block mb-2 text-md font-bold text-black-700 ">Discount</label>
        <input type="text" id="discount"
               class=" border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5 "
               placeholder="discount"
               value="{{old('discount')}}"
               required
               name="discount">
        @error('discount')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
        </p>
        @enderror
    </div>

    <label for="description" class="block mb-2 text-md font-bold text-black-700 ">Description</label>
    <textarea id="textarea"
              type="textarea"
              class="border border-black-500 text-black-900 mb-3 placeholder-gray-700 text-sm rounded-lg focus:ring-red-500 focus:border-black-500 block w-full p-2.5"
              value="{{old('description')}}"
              required
              name="description">
                    </textarea>
    @error('status')
    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$message}}</span>
    </p>
    @enderror

    <div class="flex justify-end">
        <button
            type="submit"
            class=" mr-2 flex px-4 py-2 text-sm font-semibold text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:ring focus-visible:ring-opacity-50"
        >
            Add Product
        </button>
        <button
            type="button"
            id="closeAddProductModal"
            class="mr-2 px-4 py-2 text-sm font-semibold text-gray-600 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:ring focus:ring-opacity-50"
        >
            Cancel
        </button>

    </div>
</form>


