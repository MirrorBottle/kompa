@extends('layouts.admin.index')
@section('title', 'Tambah Pengeluaran Pembukuan')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('finance.balance-book-items.store') }}" method="post">
                @include('finance.balance-book-items.form')
            </form>
        </div>
    </div>
@endsection
