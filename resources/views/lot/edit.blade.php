@extends('layouts.index')

@section('main')
    <h3 class="text-3xl font-semibold dark:text-white mb-10">{{ $title }}</h3>
    <form class="max-w-sm" action="/lot/{{ $lot->id_lot }}" method="post">
        @method('put')
        @csrf
        <div class="mb-5">
            <label for="name_lot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Case</label>
            <input type="text" id="name_lot" name="name_lot"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required value="{{ old('name_lot', $lot->name_lot) }}" />
        </div>
        <div class="grid grid-cols-3 gap-5 mb-5">
            @php
                $cases = ['SX', 'CK', 'EP', 'CT', 'ER', 'SY', 'SP'];
            @endphp
            @foreach ($cases as $case => $value)
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">                        Case {{ $value }}</label>
                    <select id="countries" name="case{{ $case + 1 }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($lot->{'case' . $case + 1} == 'Tidak')
                            <option selected value="Tidak">Tidak</option>
                            <option value="Iya">Iya</option>
                        @else
                            <option value="Tidak">Tidak</option>
                            <option selected value="Iya">Iya</option>
                        @endif
                    </select>
                </div>
            @endforeach
        </div>
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
    </form>
@endsection
