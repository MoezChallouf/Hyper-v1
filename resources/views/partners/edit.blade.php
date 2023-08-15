@extends('layouts.dashboard')
@section('title', 'Partner Management')
@section('content')

    <div class="flex justify-center items-center mt-16 h-auto">
        <div class="w-full max-w-screen-xl max-h-screen p-6 bg-white  border border-gray-500 rounded ">
            <h1 class="flex text-center justify-center text-gray-500 font-semibold mb-5 text-xl ">Edit Partner</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ route('partners.update',$partner->id ) }}"
                  class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label for="partner_name" class="block font-semibold text-gray-700">Partner Name :</label>
                        <input type="text" name="partner_name" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner name" value="{{$partner->partner_name}}"
                               required>
                    </div>
                    <div>
                        <label for=" contact_email" class="block font-semibold text-gray-700">Email :</label>
                        <input type="email" name="contact_email" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner email" value="{{$partner->contact_email}}"
                               required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                    <div>
                        <label for=" contact_phone" class="block font-semibold text-gray-700">Phone :</label>
                        <input type="text" name="contact_phone" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner email" value="{{$partner->contact_phone}}"
                               required>
                    </div>
                    <div>
                        <label for=" contact_address" class="block font-semibold text-gray-700">Address :</label>
                        <input type="text" name="contact_address" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner address" value="{{ $partner->contact_address }}"
                               required>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">

                    <div>
                        <label for="payment_info" class="block font-semibold text-gray-700">Payment info :</label>
                        <input type="text" name="payment_info" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Partner payment info" value="{{ $partner->payment_info }}"
                               required>
                    </div>
                    <div>
                        <label for="contract_details" class="block font-semibold text-gray-700">Contract details
                            :</label>
                        <input type="text" name="contract_details" class="w-full mt-1 p-2 border rounded-lg"
                               placeholder="Contract details" value="{{ $partner->contract_details}}"
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

                <div class="form-group">
                    <label class="mb-2 block font-semibold text-gray-700" for="logo">Logo :</label>
                    @if ($partner->logo)
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="Partner Logo" width="100">
                        <br>
                        <div class="flex items-center mr-4">
                            <input id="red-checkbox" type="checkbox"
                                   name="delete_images"
                                   value="{{ $partner->logo }}"
                                   class="w-4 h-4 mt-2 text-red-600 bg-gray-100 border-gray-200 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                            <label for="red-checkbox"
                                   class="ml-2 mt-2 text-sm font-medium text-gray-100 dark:text-gray-700">Delete</label>
                        </div>
                        <br>
                    @endif
                    <input type="file" name="logo" id="logo">
                    <small class="block mt-2 form-text text-muted">Upload a new logo or replace the existing
                        one.</small>
                </div>

                <button type="submit"
                        class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 transition duration-300">
                    Update Partner
                </button>
            </form>
        </div>
    </div>

@endsection





