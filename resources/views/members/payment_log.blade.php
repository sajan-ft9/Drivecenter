<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Payment log of <a href="/members/{{ $member->id }}">{{ __($member->name) }}</a>
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

                        <x-dropdown-link>
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
            <div class="absolute right-3 py-2"><strong><em>Rs. </em>{{ $total_paid }}</strong></div>
            <div class="mt-16">
                <h1 class="font-bold text-center text-3xl text-gray-900">
                    <a href="/members/{{ $member->id }}">{{ $member->name }}</a>
                </h1>
                <p>
                    <span>

                    </span>
                </p>

                <div class="flex justify-between items-center my-2 px-6">
                    <p
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">
                        {{ $member->vehicle }}</p>
                    <a href="#"
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Id:
                        {{ $member->userid }}</a>
                </div>
                <div class="max-h-[500px] overflow-scroll">
                    <h2 class="text-center text-lg">Payment Log</h2>
                    <table class="w-full text-sm text-center">
                        <thead class="text-md text-gray-900 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Payment Id</th>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr class="bg-white border-b">
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td class="px-6 py-4">{{ number_format($payment->amount) }}</td>
                                <td class="px-6 py-4 text-left">{{ $payment->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" class="px-6 py-4"><strong>Total</strong></td>
                            <td colspan="2" class="px-6 py-4 text-left"><strong>Rs. {{
                                    number_format($total_paid) }}</strong></td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>