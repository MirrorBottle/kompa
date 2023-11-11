@extends('layouts.admin.index')
@section('title', 'Ubah Pengguna')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div class="py-5 px-4 lg:py-5">
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50"
                role="alert">
                <div>
                    <span class="font-medium">Apabila tidak ubah password, kosongkan!
                </div>
            </div>
            <form action="{{ route('company.users.update', $user->id) }}" method="post">
                @method('PUT')
                @include('user.form', ['data' => $user])
            </form>
        </div>
    </div>
@endsection
