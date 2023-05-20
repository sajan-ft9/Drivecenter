<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Payment : 
                {{ $member->name }}
            <img src="{{ $member->image }}" height="30px" width="30px" class="rounded-full inline-flex float-right" alt="">

        </h2>
    </x-slot>

    <div class="py-6">
        <div class="relative text-left mb-2">
            <a class="ml-8 my-1 bg-gray-600 text-white px-4 py-1 hover:bg-gray-700 rounded-md"
            href="/members/{{ $member->id }}"><i class="fa-solid fa-arrow-left"></i></a>    
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full m-auto max-w-lg justify-between mb-5">

                    </div>

                    <form class="w-full m-auto max-w-lg" action="{{ route('payments.add') }}" method="POST"
                        onsubmit="handleSubmit('Payment ??')" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Amount
                                </label>
                                <input required name="amount" value="{{ old('amount') }}"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="number">
                                @error('amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-state">
                                    Member
                                </label>
                                <div class="relative">
                                    <select required name="member_id" @selected(old('member'))
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state">
                                        <option selected value="{{ $member->id }}">{{ $member->name }} : {{
                                            $member->userid }} </option>
                                    </select>
                                    @error('member')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Remarks
                                </label>
                                <textarea required name="remarks" cols="30" rows="5"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">{{ old('remarks') }}</textarea>
                                @error('remarks')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <input
                                class="appearance-none block w-full bg-indigo-400 text-gray-100 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-indigo-600 focus:border-gray-500"
                                id="grid-zip" type="submit" value="Make Payment" placeholder="90210">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>