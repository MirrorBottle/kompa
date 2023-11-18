@extends('layouts.admin.index')
@section('title', 'Daftar Pembukuan')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2"></div>
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="{{ route('finance.balance-books.create') }}"
                    class="flex items-center justify-center text-white bg-secondary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary focus:outline-none dark:focus:ring-primary">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Tambah Pembukuan
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Finalisasi</th>
                        <th scope="col" class="px-4 py-3">Nama</th>
                        <th scope="col" class="px-4 py-3">Tgl.</th>
                        <th scope="col" class="px-4 py-3">Penjualan</th>
                        <th scope="col" class="px-4 py-3">Pengeluaran</th>
                        <th scope="col" class="px-4 py-3">Pendapatan</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                @if ($book->finalized_date)
                                    <span class='bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1 rounded'>
                                        {{ $book->finalized_date->format('d/m/Y') }}
                                    </span>
                                @else
                                    <span class='bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1 rounded'>Belum
                                        Final</span>
                                @endif
                            </th>
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $book->name }}
                            </th>
                            <td class="px-4 py-3">
                                {{ $book->start_date->format('d/m/Y') }} ~ {{ $book->end_date->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3">
                                {{ helperFormatCurrency($book->sales_total) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ helperFormatCurrency($book->expanse_total + $book->salary_total) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ helperFormatCurrency($book->profit) }}
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $book->id }}-button" data-dropdown-toggle="{{ $book->id }}"
                                    data-dropdown-placement="top"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $book->id }}"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="{{ $book->id }}-button">
                                        <li>
                                            <a href="{{ route('finance.balance-books.edit', $book->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">

                                                {{ $book->finalized_date ? 'Detail' : 'Ubah' }}
                                            </a>
                                        </li>
                                    </ul>
                                    @if ($book->finalized_date == null)
                                    <div class="py-1">
                                        <form action="{{ route('finance.balance-books.destroy', $book->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                onclick="return confirm('Are you sure want to delete?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
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
            {{ $books->links() }}
        </nav>
    </div>
@endsection
