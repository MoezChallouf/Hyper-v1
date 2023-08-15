@extends('layouts.dashboard')
@section('title', 'Partners Management')
@section('content')

    <body class="bg-gray-100 text-gray-900 tracking-wider leading-normal justify-center mx-auto ml-1.5">

    <div class="container w-full justify-center mx-auto px-2">

        <div class="flex justify-between">
            <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
                Partners
            </h1>
            <button class="justify-end">
                <a href="{{route('partners.create')}}"
                   class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Partner</a>
            </button>

        </div>

        <div id="loading" style="display: none;">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>

        </div>


        <div class="mydataTablee p-8 mt-6 lg:mt-0 rounded shadow bg-white">


            <table class="myDataTablee stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                <tr>
                    <th data-priority="1" class="text-center">ID</th>
                    <th data-priority="2" class="text-left">Logo</th>
                    <th data-priority="3" class="text-left">Partner Name</th>
                    <th data-priority="4" class="text-left">Email</th>
                    <th data-priority="5" class="text-center">Phone</th>
                    <th data-priority="6" class="text-center">Address</th>
                    <th data-priority="7" class="text-center">Payment Info</th>
                    <th data-priority="8" class="text-center">Contract Details</th>
                    <th data-priority="9" class="text-center">Partner Category</th>
                    <th data-priority="10" class="text-center">Status</th>
                    <th data-priority="11" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($partners as $partner)
                    <tr>
                        <td class="text-center">{{ $partner->id }}</td>
                        <td class="text-left">
                            @if ($partner->logo)
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Partner Logo"
                                     class="w-10 h-10 rounded-full">
                            @else
                                No Logo
                            @endif
                        </td>
                        <td class="text-left">{{ $partner->partner_name }}</td>
                        <td class="text-left">{{ $partner->contact_email }}</td>
                        <td class="text-center">{{ $partner->contact_phone }}</td>
                        <td class="text-center">{{ $partner->contact_address }}</td>
                        <td class="text-center">{{ $partner->payment_info }}</td>
                        <td class="text-center">{{ $partner->contract_details }}</td>
                        <td class="text-center">{{ $partner->category->name }}</td>
                        <td class="px-6 py-3 text-center">
                        <span class="py-1 px-3 rounded-full text-xs
                        @if($partner->status === 'Not Active')
                         bg-red-300 text-black-500
                         @else bg-green-300 text-black-500
                        @endif">
                         {{ $partner->status }}
                        </span>
                        </td>
                        <td class="py-3 px-6 content-center mt-6 text-center flex justify-center">
                            <div class="flex item-center ">
                                <a href="{{ route('partners.edit', ['partner' => $partner->id]) }}"
                                   class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </a>
                                {{--                                {{ route('$partner.show',['partner' => $partner->id]) }}--}}
                                <a href="#"
                                   class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>

                                <form action="{{ route('partners.destroy', ['partner' => $partner->id]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this partner?')">
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
    </body>

@endsection

