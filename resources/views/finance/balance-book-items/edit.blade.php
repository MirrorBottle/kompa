@extends('layouts.admin.index')
@section('title', 'Ubah Pengguna')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('finance.balance-book-items.update', $bookItem->id) }}" method="post">
                @method('PUT')
                @include('finance.balance-book-items.form', ['data' => $bookItem])
            </form>
        </div>
    </div>
@endsection
