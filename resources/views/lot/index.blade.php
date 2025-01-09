@extends('layouts.index')

@section('main')
    <div class="flex justify-between mb-10">
        <h3 class="text-3xl font-semibold dark:text-white">{{ $title }}</h3>
        <a href="/lot/create"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah
            Lot</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama Pembuat
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama Lot
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Cases
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($lots->isEmpty())
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th colspan="10" class="p-5 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Belum ada case
                        </th>
                    </tr>
                @endif
                @foreach ($lots as $lot)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $lot->name_made }}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{ $lot->name_lot }}
                        </td>
                        @php
                            $cases = ['SX', 'CK', 'EP', 'CT', 'ER', 'SY', 'SP'];
                            $result = [];
                        @endphp
                        <td class="px-6 py-4 text-center">
                            @foreach ($cases as $case => $value)
                                @if ($lot->{'case' . $case + 1} == 'Iya')
                                    @php
                                        $result[] = $value;
                                    @endphp
                                @endif
                            @endforeach

                            {{ implode(', ', $result) }}
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-5">
                            <a href="/lot/{{ $lot->id_lot }}/edit"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="/lot/{{ $lot->id_lot }}" method="post" class="inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
