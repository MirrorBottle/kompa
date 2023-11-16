@extends('layouts.admin.index')
@section('title', 'Ubah Penggajian')
@section('content')


<form action="{{ route('manager.salary.update', $salary->id)}}" method="post">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">
        @csrf
        <input type="hidden" name="company_id" id="company_id" value="{{ $salary->company_id }}">
        <input type="hidden" name="balance_book_id" id="balance_book_id" value="{{ $salary->balance_book_id }}">
        <input type="hidden" name="manager_id" id="manager_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="user_id" id="user_id" value="{{ $salary->id }}">
        <input type="hidden" name="approval_date" id="approval_date" value="{{ $salary->approval_date}}">
        <input type="hidden" name="finance_note" id="finance_note" value="{{  $salary->finance_note }}">
        <input type="hidden" name="commission_rate" id="commission_rate" value="{{ $salary->commission_rate }}">

        {{-- <input type="hidden" name="status" id="status" value="{{$nilaiDefault ? 2 : 1}}"> --}}

        <div class="py-4">
            <label  class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-input" readonly value="{{$salary->name}} " required>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 py-4">

            <div>
                <label  class="form-label">Gaji Pokok</label>
                <input type="text" name="base_salary" id="base_salary" class="form-input" readonly value="{{$salary->base_salary}}" required>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div>
                    <label  class="form-label">Persentase Komisi</label>
                    <input type="text" name="" id="" class="form-input" readonly value="{{$user->commission ? $user->commission->percentage : 'Tidak ada' }}" required>
                </div>
                <div>
                    <label  class="form-label">Komisi</label>
                    <input type="text" name="commission_amount" id="commission_amount" class="form-input"  value="{{$salary->commission_amount}}" required>
                </div>
            </div>
            <div>
                <label  class="form-label">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" class="form-input" value="" required>
            </div>
            <div>
                <label  class="form-label">Tanggal Berakhir</label>
                <input type="date" name="end_date" id="end_date" class="form-input" value="" required>
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
                    @forelse ($sales as $sale)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $sale->sale_date->format("d/m/Y") }}
                            </th>
                            <td class="px-4 py-3">
                                {{ $sale->customer->name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $sale->sale_amount }}
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
    </div>
        <div class="py-4">
            <label for= "message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
            <textarea id="manager_note" name='manager_note' rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis catatan mu di sini" ></textarea>
        </div>
        <div class="py-4">
            <label  class="form-label">Total Gaji</label>
            <input type="text" name="" id="" class="form-input" readonly value="{{$salary->commission_amount + $salary->base_salary }}" required>
        </div>


    <div class="flex justify-between mt-5">
        <a class="btn-secondary" href="{{ route('manager.salary.show')}}">
            <i class="fa-solid fa-chevron-left mr-2"></i>
            Kembali
        </a>
        <div>
            <button type="submit" name="status" id="status" value="{{1}}"
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
            <i class="fa-solid fa-floppy-disk mr-2"></i>
            Simpan Data
        </button>
        <button type="submit" name="status" id="status" value="{{2}}"
        class="btn-secondary inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary" href="">

            <i class="fa-solid fa-chevron-right mr-2"></i>
            Kirim
        </button>
        </div>


    </div>
</form>

    </div>
@endsection
