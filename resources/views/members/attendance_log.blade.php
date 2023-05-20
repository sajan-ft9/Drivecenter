<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Payment log of <a href="/members/{{ $member->id }}">{{ __($member->name) }}</a>
            </h2>
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
                    <p
                        class="text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition duration-150 ease-in font-medium text-sm text-center w-full py-3">Id:
                        {{ $member->userid }}</p>
                </div>
                <div class="max-h-[500px] overflow-scroll">
                    <h2 class="text-center text-lg">Attendance Log</h2>
                    <table class="w-full text-sm text-center">
                        <thead class="text-md text-gray-900 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Member</th>
                                <th scope="col" class="px-6 py-3">Start Time</th>
                                <th scope="col" class="px-6 py-3">End Time</th>
                                {{-- <th scope="col" class="px-6 py-3 text-left">Remarks</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)
                            <tr class="bg-white border-b">
                                <td>{{ $attendance->member->name }}</td>
                                <td>{{ $attendance->start_time }}</td>
                                <td class="px-6 py-4">{{ $attendance->end_time }}</td>
                                {{-- <td class="px-6 py-4 text-left">{{ $attendance->remarks }}</td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <td colspan="2" class="px-6 py-4"><strong>Total</strong></td>
                            <td colspan="2" class="px-6 py-4 text-left"><strong>Rs. {{
                                    number_format($total_paid) }}</strong></td>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>