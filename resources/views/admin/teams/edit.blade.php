@extends('layouts.admin.index')
@section('title', 'Ubah Pengguna')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('admin.teams.update', $team->id) }}" method="post">
                @method('PUT')
                @include('admin.teams.form', ['data' => $team])
            </form>
        </div>
    </div>
@endsection
