@extends('layouts.index')

@section('main')
    <div class="flex justify-between mb-10">
        <h3 class="text-3xl font-semibold dark:text-white">{{ $title }}</h3>
        <a href="/user/create"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
            User</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isEmpty())
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th colspan="4" class="p-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Belum ada user
                        </th>
                    </tr>
                @endif
                @foreach ($users as $user)
                    @if ($user->id_user != auth()->user()->id_user)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $user->username }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $user->role }}
                            </td>
                            <td class="px-6 py-4 flex gap-2 justify-center">
                                <a href="/user/{{ $user->id_user }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <form action="/user/{{ $user->id_user }}" method="post" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Are you sure want delete it?')"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
