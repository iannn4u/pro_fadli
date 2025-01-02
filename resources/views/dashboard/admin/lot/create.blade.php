@extends('dashboard.layouts.index')

@section('main')
    <h3 class="text-3xl font-semibold dark:text-white mb-10">{{ $title }}</h3>
    <form class="max-w-sm" action="/lot/create" method="post">
        @csrf
        <div class="mb-5">
            <label for="name_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
            <input type="text" id="name_user" name="name_user" readonly value="{{ auth()->user()->name_user }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="mb-5">
            <label for="username_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" id="username_user" name="username_user"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required readonly value="{{ auth()->user()->name_user }}" />
        </div>
        <div class="mb-5">
            <label for="name_lot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Case</label>
            <input type="text" id="name_lot" name="name_lot"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required />
        </div>
        <div class="grid grid-cols-3 gap-5 mb-5">
            @for ($i = 0; $i < 7; $i++)
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Lot {{ $i + 1 }}</label>
                    <select id="countries" name="lot{{ $i + 1 }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            @endfor
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
