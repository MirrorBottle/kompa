@extends('layouts.admin.index')
@section('title', 'Ubah Pengguna')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('manager.user-commission-rates.update', $user->id) }}" method="post">
                @method('PUT')
                @include('manager.user-commission-rates.form', ['data' => $user])
            </form>
        </div>
    </div>
@endsection
