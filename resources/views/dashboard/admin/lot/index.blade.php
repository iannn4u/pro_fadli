@extends('dashboard.layouts.index')

@section('main')
    <div class="flex justify-between mb-10">
        <h3 class="text-3xl font-semibold dark:text-white">{{ $title }}</h3>
        <a href="/lot/create"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
            new case</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name Lot
                    </th>
                    @for ($i = 1; $i < 8; $i++)
                        <th scope="col" class="px-6 py-3">
                            Lot {{ $i }}
                        </th>
                    @endfor
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lots as $lot)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $lot->name_user }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $lot->username_user }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $lot->name_lot }}
                        </td>
                        @for ($i = 1; $i < 8; $i++)
                            <td class="px-6 py-4">
                                {{ $lot->{'lot' . $i} }}
                            </td>
                        @endfor
                        <td class="px-6 py-4 flex justify-center gap-5">
                            <a href="/lot/edit/{{ $lot->id_lot }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/lot/delete/{{ $lot->id_lot }}" onclick="return confirm('are you sure wnat delete it?')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
