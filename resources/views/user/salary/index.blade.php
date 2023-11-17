@extends('layouts.admin.index')
@section('title', 'Daftar Penggajian')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    @forelse ($salary as $salari)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">
                                {{ $salari->manager->name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ helperFormatCurrency($salari->user->base_salary) }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $salari->start_date->format('d/m') }} - {{ $salari->end_date->format('d/m/Y') }}
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
            {{ $salary->links() }}
        </nav>
    </div>
@endsection
