@extends('layouts.admin.index')
@section('title', 'Daftar Rencana Komisi')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2"></div>
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="{{ route('manager.user-commission-rates.create', $user->id) }}"
                    class="flex items-center justify-center text-white bg-secondary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary focus:outline-none dark:focus:ring-primary">
                    <i class="fa-solid fa-edit mr-2"></i>
                    Ubah Rencana Komisi
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Pegawai: {{ $user->name }}
                    <p class="mt-1 text-sm font-normal text-gray-500">Ketika menambah rencana komisi, maka rencana komisi
                        sebelumnya akan berubah menjadi <span
                            class='bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1 rounded'>Nonaktif</span></p>

                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-4 py-3">Komisi</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Tgl. Invalid</th>
                        <th scope="col" class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rates as $rate)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $rate->commission->name }}
                            </th>
                            <td class="px-4 py-3">
                                @if ($rate->is_invalid)
                                    <span
                                        class='bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1 rounded'>Nonaktif</span>
                                @else
                                    <span
                                        class='bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1 rounded'>Aktif</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                {{ $rate->is_invalid ? $rate->invalid_date->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                @if ($rate->is_invalid)
                                    <button id="{{ $rate->id }}-button" data-dropdown-toggle="{{ $rate->id }}"
                                        data-dropdown-placement="top"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $rate->id }}"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">

                                        <div class="py-1">
                                            <form action="{{ route('manager.user-commission-rates.destroy', $rate->id) }}"
                                                method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                    onclick="return confirm('Are you sure want to delete?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div></div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4">
                                <img class="w-32 h-32 mx-auto"
                                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                    alt="image empty states">
                                <p class="text-gray-700 font-medium text-lg text-center">Datamu masih kosong sepertinya...
                                </p>
                                <p class="text-gray-500 text-center">Kamu bisa menambah datamu dengan mudah!</p>
                            </th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav class="space-y-3 md:space-y-0 p-4">
            {{ $rates->links() }}
        </nav>
    </div>
@endsection
