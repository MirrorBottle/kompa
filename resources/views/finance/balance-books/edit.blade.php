@extends('layouts.admin.index')
@section('title', 'Detail Pembukuan')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="py-5 px-4 lg:py-5">
            @if ($book->finalized_date == null)
                <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                    <div>
                        <span class="font-medium">Apabila data disimpan maka pembukuan akan dianggap <b>Final</b>
                    </div>
                </div>
            @else
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <div>
                        <span class="font-medium">Tanggal Finalisasi <b>{{ $book->finalized_date->format('d/m/Y') }}</b>
                    </div>
                </div>
            @endif
            <form action="{{ route('finance.balance-books.update', $book->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="grid gap-4 grid-cols-4">
                    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
                    <div class="col-span-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-input bg-white"
                            value="{{ $book->name }}" required {{ $book->finalized_date ? 'disabled' : '' }}>
                    </div>
                    <div>
                        <label for="start_date" class="form-label">Tgl. Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="form-input"
                            value="{{ $book->start_date->format('Y-m-d') }}" disabled>
                    </div>
                    <div>
                        <label for="end_date" class="form-label">Tgl. Akhir</label>
                        <input type="date" name="end_date" id="end_date" class="form-input"
                            value="{{ $book->end_date->format('Y-m-d') }}" disabled>
                    </div>
                    <div class="col-span-2 mt-4">
                        <label for="sales_total" class="form-label">Total Pendapatan</label>
                        <input type="{{ $book->finalized_date ? 'text' : 'number' }}" name="sales_total" id="sales_total" class="form-input bg-white"
                            value="{{ $book->finalized_date ? helperFormatCurrency($sales_total) : $sales_total }}" required {{ $book->finalized_date ? 'disabled' : '' }}>
                    </div>
                    <div class="mt-4">
                        <label for="salary_total" class="form-label">Total Penggajian</label>
                        <input type="{{ $book->finalized_date ? 'text' : 'number' }}" name="salary_total" id="salary_total" class="form-input bg-white"
                            value="{{ $book->finalized_date ? helperFormatCurrency($salary_total) :$salary_total }}" required {{ $book->finalized_date ? 'disabled' : '' }}>
                    </div>
                    <div class="mt-4">
                        <label for="expanse_total" class="form-label">Total Pengeluaran</label>
                        <input type="{{ $book->finalized_date ? 'text' : 'number' }}" name="expanse_total" id="expanse_total" class="form-input bg-white"
                            value="{{ $book->finalized_date ? helperFormatCurrency($expanse_total) :$expanse_total }}" required {{ $book->finalized_date ? 'disabled' : '' }}>
                    </div>
                    <div class="col-span-4">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Daftar Penjualan

                            </caption>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Tanggal Penjualan</th>
                                    <th scope="col" class="px-4 py-3">Pegawai</th>
                                    <th scope="col" class="px-4 py-3">Nama Pelanggan</th>
                                    <th scope="col" class="px-4 py-3">Jumlah Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $sale)
                                    <tr class="border-b dark:border-gray-700">
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                            {{ $sale->sale_date->format('d/m/Y') }}
                                        </th>
                                        <td class="px-4 py-3">
                                            {{ $sale->user->name }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $sale->customer->name }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ helperFormatCurrency($sale->sale_amount) }}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="4">

                                            <div class="text-center mt-4">
                                                <img class="w-32 h-32 mx-auto"
                                                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                                    alt="image empty states">
                                                <p class="text-gray-700 font-medium text-lg text-center">Tidak ada data...
                                                </p>
                                            </div>
                                        </th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>


                    <div class="col-span-4">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Daftar Penggajian

                            </caption>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Manager</th>
                                    <th scope="col" class="px-4 py-3">Gaji Pokok</th>
                                    <th scope="col" class="px-4 py-3">Tgl</th>
                                    <th scope="col" class="px-4 py-3">Komisi</th>
                                    <th scope="col" class="px-4 py-3">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($salaries as $salari)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            {{ $salari->manager->name }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ helperFormatCurrency($salari->user->base_salary) }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $salari->start_date->format('d/m') }} -
                                            {{ $salari->end_date->format('d/m/Y') }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ helperFormatCurrency($salari->commission_amount) }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ helperFormatCurrency($salari->total) }}

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="4">

                                            <div class="text-center mt-4">
                                                <img class="w-32 h-32 mx-auto"
                                                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                                    alt="image empty states">
                                                <p class="text-gray-700 font-medium text-lg text-center">Tidak ada data...
                                                </p>
                                            </div>
                                        </th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <div class="col-span-4 mt-4">
                        <div class="flex justify-between">
                            <p
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Daftar Pengeluaran
                            </p>
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                @if ($book->finalized_date == null)
                                    <a href="{{ route('finance.balance-book-items.create', $book->id) }}"
                                        class="flex items-center justify-center text-white bg-secondary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary focus:outline-none dark:focus:ring-primary">
                                        <i class="fa-solid fa-plus mr-2"></i>
                                        Tambah Pengeluaran
                                    </a>
                                @endif
                            </div>
                        </div>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama</th>
                                    <th scope="col" class="px-4 py-3">Tipe</th>
                                    <th scope="col" class="px-4 py-3">Total</th>
                                    <th scope="col" class="px-4 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($book->items as $item)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-3">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ helperFormatCurrency($item->amount) }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $item->type_name }}
                                        </td>
                                        <td class="px-4 py-3">
                                            @if ($book->finalized_date == null)
                                                <a href="{{ route('finance.balance-book-items.destroy', $item->id) }}"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                                    onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="4">
                                            <div class="text-center mt-4">
                                                <img class="w-32 h-32 mx-auto"
                                                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                                    alt="image empty states">
                                                <p class="text-gray-700 font-medium text-lg text-center">Tidak ada data...
                                                </p>
                                            </div>
                                        </th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="flex justify-between mt-5">
                    <a class="btn-secondary" href="{{ route('admin.users.index') }}">
                        <i class="fa-solid fa-chevron-left mr-2"></i>
                        Kembali
                    </a>
                    @if ($book->finalized_date == null)
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
                            <i class="fa-solid fa-floppy-disk mr-2"></i>
                            Simpan Data
                        </button>
                    @endif
                </div>

            </form>
        </div>
    </div>
@endsection
