@extends('layouts.admin.index')
@section('title', 'Tambah Pembukuan')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('finance.balance-books.store') }}" method="post">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
                    <div>
                        <label for="start_date" class="form-label">Tgl. Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="form-input" value="{{ \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d') }}" required>
                    </div>
                    <div>
                        <label for="end_date" class="form-label">Tgl. Akhir</label>
                        <input type="date" name="end_date" id="end_date" class="form-input" value="{{ \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="flex justify-between mt-5">
                    <a class="btn-secondary" href="{{ route('admin.users.index') }}">
                        <i class="fa-solid fa-chevron-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Simpan Data
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
