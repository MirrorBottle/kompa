@extends('layouts.admin.index')
@section('title', 'Tambah Pengguna')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('company.users.store') }}" method="post">
                @include('user.form')
            </form>
        </div>
    </div>
@endsection
