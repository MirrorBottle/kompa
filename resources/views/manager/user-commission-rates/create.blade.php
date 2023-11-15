@extends('layouts.admin.index')
@section('title', 'Ubah Rencana Komisi')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('manager.user-commission-rates.store') }}" method="post">
                @include('manager.user-commission-rates.form')
            </form>
        </div>
    </div>
@endsection
