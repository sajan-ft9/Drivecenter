<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="/members/{{ $member->id }}">{{ __($member->name) }}</a>
            </h2>
            <div class="sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>More</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="'/payments/'.$member->id">
                            Payment Log
                        </x-dropdown-link>

                        <x-dropdown-link :href="'/attendance/'.$member->id">
                            Attendance Log
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>

    </x-slot>
    <x-message></x-message>

    <div class="py-16">
        <div class="bg-white relative shadow rounded-lg w-5/6 md:w-5/6  lg:w-4/6 xl:w-3/6 mx-auto">
            <div class="flex justify-center">
                <img src="{{ asset($member->image) }}" alt=""
                    class="rounded-full mx-auto absolute -top-20 w-32 h-32 shadow-md border-4 border-white transition duration-200 transform hover:scale-110">
            </div>
            <div class="mt-16">
                <h1 class="font-bold text-center text-3xl text-gray-900"><a href="/members/{{ $member->id }}">{{
                        $member->name }}</a></h1>
                <p class="text-center text-sm text-gray-400 font-medium">{{ $member->email }}</p>
                <p>
                    <span>

                    </span>
                </p>

                <div class="flex justify-between items-center my-2 px-6">
                    <p
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        {{ $member->vehicle }}</p>
                    <p
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        Id:
                        {{ $member->userid }}</p>
                </div>
                <div class="flex justify-between items-center px-6">
                    <p
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        <strong class="text-green-600"><em>Paid: Rs. </em>{{ $total_paid }}</strong>
                    </p>
                    {{-- <p
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        <strong class="text-red-600"><em>Remaining: Rs. </em>{{ $total_paid}}</strong>
                    </p> --}}
                </div>
                <div class="container text-lg px-5 mx-auto flex flex-wrap">
                    <div class="h-full p-4 sm:w-1/2">
                        <div class="">
                            <a href="{{ route('payments.add').'/'.$member->id }}"
                                class="bg-green-700 rounded-lg relative text-white inline-flex px-8 py-2 items-center">Make Payment <i
                                    class="fa fa-money-bill-1-wave ml-1"></i></a>
                        </div>
                    </div>
                    <div class="h-full p-4 sm:w-1/2">
                        <div class="">
                            <a  href="{{ route('attendance.add').'/'.$member->id }}" class="bg-gray-700 rounded-lg px-8 py-2 relative text-white inline-flex items-center">Attendance <i
                                    class="fa fa-clipboard-user ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <div class="w-full">
                    <h3 class="font-medium text-gray-900 text-left px-6">More Info</h3>
                    <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm">
                        <p
                            class="border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                            <img src="{{ $member->image }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                            <strong>Phone:</strong> {{ $member->phone }}
                        </p>
                        <p
                            class="border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                            <img src="{{ $member->image }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                            <strong>Address:</strong> {{ $member->address }}
                        </p>
                        <p
                            class="border-t border-gray-100 text-gray-600 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                            <img src="{{ $member->image }}" alt="" class="rounded-full h-6 shadow-md inline-block mr-2">
                            <strong>Joined on: </strong>{{ $member->created_at }}
                        </p>
                        <a href="/members/edit/{{ $member->id}}"
                            class="border-t border-gray-100 flex justify-center text-white bg-indigo-600 py-4 pl-6 pr-3 w-full  hover:bg-indigo-500 transition duration-150">
                            <strong>Update</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>