<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
            <span class="inline-flex float-right">
                <form action="{{ url('members') }}" method="GET">
                    <input class="border-gray-200 rounded-lg text-sm" name="search" type="text" placeholder="search"
                        required>
                </form>
            </span>
        </h2>
    </x-slot>
    <x-message></x-message>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-left">
                <a title="Add Member" class="bg-indigo-400 m-2 px-3 py-2 rounded-md text-white"
                href="{{ route('members.create') }}">Add<i class="fa-solid fa-plus ml-1 text-lg"></i></a>
            </div>
            @if(!isset($page))
            <div class="row m-2">
                <div class="col-md-12">
                    {{ $members->links('pagination::tailwind') }}
                </div>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <ul role="list" class="divide-y divide-gray-100">
                        @if (count($members))
                        @foreach ($members as $member)
                        <a href="members/{{ $member->id }}">
                            <li class="flex justify-between gap-x-6 py-5 border-b-2 border-gray-300">
                                <div class="flex gap-x-4">
                                    <img class="h-12 w-12 rounded-full flex-none bg-gray-50" src="{{ $member->image }}"
                                        alt="">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $member->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                                            {{ $member->email }} | Id: {{ $member->userid }}</p>
                                    </div>
                                </div>
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900">{{ $member->vehicle }}</p>
                                </div>
                            </li>
                        </a>
                        @endforeach
                        @else

                        <div id="alert-3" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                                No members found!!
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 "
                                data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>