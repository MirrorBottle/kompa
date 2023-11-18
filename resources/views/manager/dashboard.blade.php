@extends('layouts.admin.index')
@section('title', 'Selamat Datang, ' . auth()->user()->name)
@section('content')
    <section class="min-h-screen">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-2">
                <div
                    class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Penggajian</h5>
                        <a href="{{ route('manager.salary.show') }}"
                            class="text-sm font-medium text-primary hover:underline dark:text-blue-500">
                            Lihat Semua
                        </a>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($data['salaries'] as $salary)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $salary['name'] }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $salary['total'] }}
                                            </p>
                                        </div>
                                        {!! $salary['status'] !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <div
                    class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Total Penjualan per Bulan
                        </h5>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($data['members'] as $member)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                {{ $member['name'] }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                {{ $member['commission'] }}

                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            {{ $member['total'] }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-6">
                <div
                    class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Penjualan Terbaru</h5>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-3">
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
                                                <p class="text-gray-700 font-medium text-lg text-center">Datamu masih kosong
                                                    sepertinya...
                                                </p>
                                                <p class="text-gray-500 text-center">Kamu bisa menambah datamu dengan mudah!
                                                </p>
                                            </div>
                                        </th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <nav class="space-y-3 md:space-y-0 p-4">
                        {{ $sales->links() }}
                    </nav>
                </div>
            </div>

        </div>
    </section>
@endsection
