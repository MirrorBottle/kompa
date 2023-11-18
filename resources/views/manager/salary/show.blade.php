@extends('layouts.admin.index')
@section('title', 'Daftar Penggajian')
@section('content')

    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden ">
        <div class="flex flex-row md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2"></div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Nama</th>
                        <th scope="col" class="px-4 py-3">Nama Pegawai</th>
                        <th scope="col" class="px-4 py-3">Gaji Pokok</th>
                        <th scope="col" class="px-4 py-3">Rate Komisi</th>
                        <th scope="col" class="px-4 py-3">Total Komisi</th>
                        <th scope="col" class="px-4 py-3">Total Gaji</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Catatan Manajer</th>
                        <th scope="col" class="px-4 py-3">Catatan Finance</th>
                        <th scope="col" class="px-4 py-3">Tanggal Mulai</th>
                        <th scope="col" class="px-4 py-3">Tanggal Akhir</th>
                        <th scope="col" class="px-4 py-3">Tanggal Disetujui</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($salary as $salari)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $salari->name }}
                            </th>
                            <td class="px-4 py-3">
                                {{ $salari->user->name }}
                            </td>
                            <td class="px-4 py-3">
                                Rp.{{ $salari->base_salary }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->user->commission->name }}
                            </td>
                            <td class="px-4 py-3">
                                Rp.{{ $salari->commission_amount }}
                            </td>
                            <td class="px-4 py-3">
                                Rp.{{ $salari->commission_amount + $salari->base_salary}}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->status_name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->manager_note }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->finance_note }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->start_date}}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->end_date }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->approval_date }}
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $salari->id }}-button" data-dropdown-toggle="{{ $salari->id }}"
                                    data-dropdown-placement="top"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $salari->id }}"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="">
                                        <li>
                                            <a href="{{ route('manager.salary.edit', $salari->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4">
                                <div>
                                    <img class="w-32 h-32 mx-auto"
                                        src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                        alt="image empty states">
                                    <p class="text-gray-700 font-medium text-lg text-center">Datamu masih kosong
                                        sepertinya...</p>
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
