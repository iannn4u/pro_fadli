@extends('layouts.index')

@section('main')
    <h3 class="text-3xl font-semibold dark:text-white mb-10">{{ $title }}</h3>
    <form class="max-w-sm" action="/daily" method="post">
        @csrf
        <div class="max-w-sm mb-5">
            <label for="datepicker-autohide"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
            <input id="datepicker-autohide" datepicker datepicker-autohide datepicker-buttons datepicker-autoselect-today
                datepicker-format="dd/mm/yyyy" name="date_daily" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Pilih Tanggal" autocomplete="off">
        </div>


        <div class="relative">
            <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                class="w-full flex justify-center mb-5 items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Pilih Lot</button>

            <!-- Dropdown menu -->
            <div id="dropdownSearch" class="z-10 w-full hidden bg-white rounded-lg shadow dark:bg-gray-700">
                <ul class="h-32 px-3 pb-3 grid grid-cols-4 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownSearchButton">
                    @foreach ($lots as $lot)
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="{{ $lot->name_lot }}" type="checkbox" value="{{ $lot->id_lot }}" name="id_lot[]"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="{{ $lot->name_lot }}"
                                    class="w-full ms-2 text-sm h-full font-medium text-gray-900 rounded dark:text-gray-300">{{ $lot->name_lot }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
    </form>
@endsection
