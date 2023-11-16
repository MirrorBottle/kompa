@extends('layouts.admin.index')
@section('title', 'Histori Gaji')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">
        <div class="flex flex-row md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0  flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Search" required="">
                    </div>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Tanggal</th>
                        <th scope="col" class="px-4 py-3">Gaji Pokok</th>
                        <th scope="col" class="px-4 py-3">Total Komisi</th>
                        <th scope="col" class="px-4 py-3">Total Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($salary as $salari)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $salari->approval_date }}
                            </th>
                            <td class="px-4 py-3">
                                {{ $salari->base_salary }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->commission_amount }}
                            </td>
                            <td class="px-4 py-3">
                                {{$salari->base_salary + $salari->commission_amount }}
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
                                    <p class="text-gray-500 text-center">Kamu bisa menambah datamu dengan mudah!</p>
                                </div>
                            </th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav class="space-y-3 md:space-y-0 p-4">
            {{ $salary->links() }}
        </nav>
    </div>
@endsection
