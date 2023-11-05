@extends('layouts.admin.index')
@section('title', 'Dashboard')
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                <li class="mr-2">
                    <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                        aria-selected="true"
                        class="inline-block p-4 text-secondary rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Evaluasi</button>
                </li>
                <li class="mr-2">
                    <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                        aria-controls="services" aria-selected="false"
                        class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">HIRAC
                        Terbaru</button>
                </li>
                <li class="mr-2">
                    <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab"
                        aria-controls="statistics" aria-selected="false"
                        class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Pembayaran</button>
                </li>
            </ul>
            <div id="defaultTabContent">
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                    aria-labelledby="about-tab">
                    <div class="flow-root max-w-3xl">
                        <div class="-my-4 divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                                <p class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                                    08:00 - 09:00
                                </p>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">Opening remarks</a>
                                </h3>
                            </div>
                            <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                                <p class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                                    09:00 - 10:00
                                </p>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline">Bergside LLC: Controlling the video traffic
                                        flows</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel"
                    aria-labelledby="services-tab">
                    <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the
                        world’s potential</h2>
                    <!-- List -->
                    <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-secondary dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="leading-tight">Dynamic reports and dashboards</span>
                        </li>
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-secondary dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="leading-tight">Templates for everyone</span>
                        </li>
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-secondary dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="leading-tight">Development workflow</span>
                        </li>
                        <li class="flex space-x-2 items-center">
                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-secondary dark:text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            <span class="leading-tight">Limitless business automation</span>
                        </li>
                    </ul>
                </div>
                <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel"
                    aria-labelledby="statistics-tab">
                    <div
                        class="mb-6 grid grid-cols-1 gap-y-6 px-4 pt-6 dark:border-gray-700 dark:bg-gray-900 xl:grid-cols-2 xl:gap-4">
                        <div class="flex border-gray-200 bg-white flex-col" data-testid="flowbite-card">
                            <div class="flex h-full flex-col justify-center gap-4 p-6"><a href="#"
                                    class="flex items-center text-2xl font-bold dark:text-white"> <img class="h-[40px]"
                                        src="{{ asset('assets/images/logo_full.png') }}" alt="">
                                </a>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Saat ini anda menggunakan
                                    trial 30 hari dari kami, sebelum masa trial habis anda bisa berlangganan. Apabila masa
                                    trial habis, maka data anda akan kami hapus.</p>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">Masa Trial habis pada tanggal
                                    30 September, 2023</p>
                                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-3">
                                    <div><a href="#"
                                            class="inline-flex w-full items-center justify-center rounded-lg bg-primary py-2.5 px-5 text-center text-sm font-medium text-white hover:bg-primary focus:ring-4 focus:ring-primary dark:bg-primary dark:hover:bg-primary dark:focus:ring-primary sm:w-auto">
                                            <i class="fa-solid fa-file mr-2"></i>
                                            Berlangganan
                                        </a>
                                    </div>
                                    <div><a href="#"
                                            class="inline-flex w-full items-center justify-center rounded-lg border border-gray-300 bg-white py-2.5 px-5 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-primary dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">Lihat Fitur Lainnya</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex rounded-lg border border-gray-200 bg-white flex-col" data-testid="flowbite-card">
                            <div class="flex h-full flex-col justify-center gap-4 p-6">
                                <div class="mb-4 flex items-center justify-between">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Histori Pembayaran</h3>
                                    <div class="shrink-0"><a
                                            class="rounded-lg p-2 text-sm font-medium text-primary hover:bg-gray-100 dark:text-primary dark:hover:bg-gray-700"
                                            href="#">Lihat Semua</a></div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto rounded-lg">
                                        <div class="inline-block min-w-full align-middle">
                                            <div class="overflow-hidden shadow sm:rounded-lg">
                                                <div data-testid="table-element"
                                                    class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                                    <table
                                                        class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                                                        <thead
                                                            class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>
                                                                <th class="px-6 py-3">Transaction</th>
                                                                <th class="px-6 py-3">Date &amp; Time</th>
                                                                <th class="px-6 py-3">Amount</th>
                                                                <th class="px-6 py-3">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr data-testid="table-row-element" class="">
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 text-sm font-normal text-gray-900 dark:text-white">
                                                                    Payment from&nbsp;<span class="font-semibold">Bonnie
                                                                        Green</span></td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                                                    Apr 23 ,2021</td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 text-sm font-semibold text-gray-900 dark:text-white">
                                                                    $2300</td>
                                                                <td class="px-6 py-4 flex whitespace-nowrap p-4"><span
                                                                        class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 p-1 text-xs"
                                                                        data-testid="flowbite-badge"><span>Completed</span></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-testid="table-row-element"
                                                                class="bg-gray-50 dark:bg-gray-700">
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap rounded-l-lg p-4 text-sm font-normal text-gray-900 dark:text-white">
                                                                    Payment refund to&nbsp;<span
                                                                        class="font-semibold">#00910</span></td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 text-sm font-normal text-gray-500 dark:text-gray-400">
                                                                    Apr 23 ,2021</td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 text-sm font-semibold text-gray-900 dark:text-white">
                                                                    -$670</td>
                                                                <td
                                                                    class="px-6 py-4 flex whitespace-nowrap rounded-r-lg p-4">
                                                                    <span
                                                                        class="flex h-fit items-center gap-1 font-semibold bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 group-hover:bg-green-200 dark:group-hover:bg-green-300 rounded-full px-2 py-1 p-1 text-xs"
                                                                        data-testid="flowbite-badge"><span>Completed</span></span>
                                                                </td>
                                                            </tr>
                                                            <tr data-testid="table-row-element" class="">
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 pb-0 text-sm font-normal text-gray-900 dark:text-white">
                                                                    Payment failed from&nbsp;<span
                                                                        class="font-semibold">#087651</span></td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 pb-0 text-sm font-normal text-gray-500 dark:text-gray-400">
                                                                    Apr 18, 2021</td>
                                                                <td
                                                                    class="px-6 py-4 whitespace-nowrap p-4 pb-0 text-sm font-semibold text-gray-900 dark:text-white">
                                                                    $234</td>
                                                                <td class="px-6 py-4 flex whitespace-nowrap p-4 pb-0"><span
                                                                        class="flex h-fit items-center gap-1 font-semibold bg-red-100 text-red-800 dark:bg-red-200 dark:text-red-900 group-hover:bg-red-200 dark:group-hover:bg-red-300 rounded-full px-2 py-1 p-1 text-xs"
                                                                        data-testid="flowbite-badge"><span>Cancelled</span></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection
