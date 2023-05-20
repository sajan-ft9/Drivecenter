<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-scroll shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-center">
                        <thead class="font-large text-gray-900 font-bold uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">Payment Id</th>
                                <th scope="col" class="px-6 py-3">Date</th>
                                <th scope="col" class="px-6 py-3">Member Name</th>
                                <th scope="col" class="px-6 py-3">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr class="bg-white border-b">
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <th class="px-8 py-4 font-large text-gray-900 ">
                                    <a href="/members/{{ $payment->member->id }}">{{ $payment->member->name }}</a></th>
                                <td class="px-6 py-4">{{ $payment->amount }}</td>
                                <td class="px-6 py-4 text-left">{{ $payment->remarks }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <th colspan="3">Total</th>
                        <th colspan="2" class="text-left">Rs. {{ number_format($total) }}</th>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>