@extends('layouts.dashboard')
@section('title', 'Partner Management')
@section('content')

    <div class="flex justify-center items-center mt-16 h-auto">
        <div class="w-full max-w-xl p-6 bg-white  border border-gray-500 rounded ">
            <h1 class="flex text-center justify-center text-gray-500 font-semibold mb-5 text-xl ">Create New
                Partner</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ route('partners.store') }}"
                  class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label for="partner_name" class="block font-semibold text-gray-700">Partner Name :</label>
                        <input type="text" name="partner_name" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner name" value="{{ old('partner_name') }}"
                               required>
                    </div>
                    <div>
                        <label for=" contact_email" class="block font-semibold text-gray-700">Email :</label>
                        <input type="email" name="contact_email" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner email" value="{{ old('contact_email') }}"
                               required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label for=" contact_phone" class="block font-semibold text-gray-700">Phone :</label>
                        <input type="text" name="contact_phone" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner email" value="{{ old('contact_phone') }}"
                               required>
                    </div>
                    <div>
                        <label for=" contact_address" class="block font-semibold text-gray-700">Address :</label>
                        <input type="text" name="contact_address" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner address" value="{{ old('contact_address') }}"
                               required>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">

                    <div>
                        <label for="payment_info" class="block font-semibold text-gray-700">Payment info :</label>
                        <input type="text" name="payment_info" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner payment info" value="{{ old('payment_info') }}"
                               required>
                    </div>
                    <div>
                        <label for="contract_details" class="block font-semibold text-gray-700">Contract details
                            :</label>
                        <input type="text" name="contract_details" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Contract details" value="{{ old('contract_details') }}"
                               required>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label class="block font-semibold text-gray-700"
                               for="category_id">Partner Category :</label>
                        <select
                            class=" w-full mt-1 p-2 border rounded-lg "
                            id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status"
                               class="block font-semibold text-gray-700 ">Status :</label>
                        <select
                            class=" w-full mt-1 p-2 border rounded-lg"
                            id="status" name="status">
                            <option value="Active">Active</option>
                            <option value="Not Active">Not Active</option>
                        </select>
                    </div>
                </div>


                <div>
                    <label for=" logo" class="block font-semibold text-gray-700">Partner logo</label>
                    <input type="file" name="logo" class="w-full mt-1 p-2 border rounded-lg"
                           required>
                </div>

                <button type="submit"
                        class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-300">
                    Create Partner
                </button>
            </form>
        </div>
    </div>

@endsection





