@extends('layouts.admin.index')
@section('title', 'Detail Penggajian')
@section('content')

    <form action="{{ route("finance.salaries.update", $salary->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">

            <div class="py-4">
                <label class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-input" readonly
                    value="{{ $salary->user->name }} ">


            </div>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 py-4">

                <div>
                    <label class="form-label">Gaji Pokok</label>
                    <input type="text" name="base_salary" id="base_salary" class="form-input" readonly
                        value="{{ helperFormatCurrency($salary->base_salary) }}">
                </div>
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div>
                        <label class="form-label">Persentase Komisi</label>
                        <input type="text" name="" id="" class="form-input" readonly
                            value="{{ $salary->commission_rate . '%' }}">
                    </div>
                    <div>
                        <label class="form-label">Komisi</label>
                        <input type="text" name="commission_amount" id="commission_amount" class="form-input" disabled
                            value="{{ helperFormatCurrency($salary->commission_amount) }}">
                    </div>
                </div>
                <div>
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" class="form-input bg-white"
                        value="{{ \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d') }}">
                </div>
                <div>
                    <label class="form-label">Tanggal Berakhir</label>
                    <input type="date" name="end_date" id="end_date" class="form-input bg-white"
                        value="{{ \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d') }}">
                </div>
            </div>

            <div class="bg-gray-100 dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <caption
                            class="p-5 text-lg font-semibold text-center rtl:text-right text-gray-900  dark:text-white dark:bg-gray-800">
                            PENJUALAN
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Tanggal Penjualan</th>
                                <th scope="col" class="px-4 py-3">Nama Pelanggan</th>
                                <th scope="col" class="px-4 py-3">Jumlah Penjualan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($salary->sales as $sale)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                        {{ $sale->sale_date->format('d/m/Y') }}
                                    </th>
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
                                            <p class="text-gray-700 font-medium text-lg text-center">
                                                Tidak ada data penjualan...
                                            </p>
                                        </div>
                                    </th>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="py-4">
                <label for= "message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan
                    Manager</label>
                <textarea id="manager_note" name='manager_note' rows="4" class="form-input" disabled
                    placeholder="Tulis catatan mu di sini">{{ $salary->manager_note }}</textarea>
            </div>
            <div class="py-4">
                <label class="form-label">Total Gaji</label>
                <input type="text" name="" id="total_salary" class="form-input" readonly
                    value="{{ helperFormatCurrency($salary->commission_amount + $salary->base_salary) }}">
            </div>
            <div class="py-4">
                <label for= "message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan
                    Finance</label>
                <textarea id="finance_note" name='finance_note' rows="4" class="form-input bg-white"
                    placeholder="Tulis catatan mu di sini">{{ $salary->finance_note }}</textarea>
            </div>
            <div class="flex justify-between mt-5">
                <a class="btn-secondary" href="{{ route('manager.team.index') }}">
                    <i class="fa-solid fa-chevron-left mr-2"></i>
                    Kembali
                </a>
                <div>
                    @if ([in_array($salary->status, [2, 4, 5])])
                        <button type="submit" name="status" id="status" value="{{ 3 }}"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-warning rounded-lg focus:ring-4 focus:ring-warning dark:focus:ring-warning hover:bg-warning">
                            <i class="fa-solid fa-exclamation mr-2"></i>
                            Pending
                        </button>
                    @endif
                    @if ([in_array($salary->status, [2, 3, 5])])
                        <button type="submit" name="status" id="status" value="{{ 5 }}"
                            class="btn-secondary inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-error rounded-lg focus:ring-4 focus:ring-error dark:focus:ring-error hover:bg-error hover:text-white"
                            href="">
                            <i class="fa-solid fa-times mr-2"></i>
                            Tolak
                        </button>
                    @endif
                    @if ([in_array($salary->status, [2, 3, 4])])
                        <button type="submit" name="status" id="status" value="{{ 4 }}"
                            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-success rounded-lg focus:ring-4 focus:ring-success dark:focus:ring-success hover:bg-success">
                            <i class="fa-solid fa-check mr-2"></i>
                            Terima
                        </button>
                    @endif
                </div>
            </div>
    </form>
@endsection
