@extends('layouts.admin.index')
@section('title', 'Tambah Tim')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('admin.teams.store') }}" method="post">
                @include('admin.teams.form')
            </form>
        </div>
    </div>
@endsection
