@extends('dashboard.layouts.index')

@section('main')
    <div class="flex justify-between mb-10">
        <h3 class="text-3xl font-semibold dark:text-white">{{ $title }}</h3>
        @if (auth()->user()->role == 'admin')
            <a href="/daily/create"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                new daily</a>
        @endif
    </div>



    <div id="accordion-collapse" data-accordion="collapse">
        @foreach ($dailies as $date => $dailys)
            <h4 class="text-2xl font-bold dark:text-white mt-10 mb-2">{{ $date }}</h4>
            @foreach ($dailys as $daily => $value)
                <h2 id="accordion-collapse-heading-{{ $value->id_daily }}">
                    <button type="button"
                        class="flex bg-gray-200 items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-{{ $value->id_daily }}" aria-expanded="true"
                        aria-controls="accordion-collapse-body-{{ $value->id_daily }}">
                        {{ $value->lot->name_lot }}
                    </button>
                </h2>
                <div id="accordion-collapse-body-{{ $value->id_daily }}" class="hidden overflow-x-scroll"
                    aria-labelledby="accordion-collapse-heading-{{ $value->id_daily }}">
                    <table class="w-full text-sm text-left rtl:text-right dark:text-gray-400">
                        <tr class="bg-gray-300 shadow-lg">
                            <th class="py-4 text-center">Lot Name</th>
                            <th class="py-4 text-center">Case</th>
                            <th class="py-4 text-center">Status</th>
                            <th class="py-4 text-center">Fullname last edited</th>
                            <th class="py-4 text-center">Action</th>
                            <th class="py-4 text-center">
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'supllier')
                                    <a href="/daily/delete/{{ $value->id_daily }}"
                                        onclick="return confirm('Are you sure want delete it?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                @endif
                            </th>
                        </tr>
                        @php
                            $status_lot = App\Models\StatusLot::where('id_daily', $value->id_daily)
                                ->where('name_case', $value->lot->name_lot)
                                ->get();
                        @endphp
                        @foreach ($status_lot as $sl => $valueSL)
                            @if ($value->lot->{'lot' . $sl + 1} == 1)
                                <tr>
                                    <td class="px-6 py-3 text-center border-r border-gray-900">{{ $valueSL->name_lot }}</td>
                                    <td class="px-6 py-3 text-center border-r border-gray-900">
                                        {{ $value->lot->{'lot' . $sl + 1} }}
                                    </td>
                                    <td class="px-6 py-3 text-center border-r border-gray-900">{{ $valueSL->status_lot }}
                                    </td>
                                    <td class="px-6 py-3 text-center border-r border-gray-900">
                                        {{ $valueSL->name_changed_status }}</td>
                                    <td class="px-6 py-3 text-center flex justify-center gap-5">
                                        <a href="/daily/status/notavailable/{{ $valueSL->id_status_lot }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </a>
                                        <a href="/daily/status/sent/{{ $valueSL->id_status_lot }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </a>
                                        <a href="/daily/status/pending/{{ $valueSL->id_status_lot }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
