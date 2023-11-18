@extends('layouts.admin.index')
@section('title', 'Daftar Pengguna')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-2">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2"></div>
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <a href="{{ route('admin.users.create') }}"
                    class="flex items-center justify-center text-white bg-secondary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary focus:outline-none dark:focus:ring-primary">
                    <i class="fa-solid fa-plus mr-2"></i>
                    Tambah Pengguna
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-4 py-3">Nama</th>
                        <th scope="col" class="px-4 py-3">Email</th>
                        <th scope="col" class="px-4 py-3">Hak Akses</th>
                        <th scope="col" class="px-4 py-3">Tim</th>
                        <th scope="col" class="px-4 py-3">Komisi</th>

                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $user->name }}
                            </th>
                            <td class="px-4 py-3">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3">
                                {!! $user->role_name_badge !!}
                            </td>
                            <td class="px-4 py-3">
                                {{ $user->team ? $user->team->name : 'Tidak ada' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $user->commission ? $user->commission->name : 'Tidak ada' }}
                            </td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button id="{{ $user->id }}-button" data-dropdown-toggle="{{ $user->id }}"
                                    data-dropdown-placement="top"
                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                                <div id="{{ $user->id }}"
                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="{{ $user->id }}-button">
                                        @if($user->role_name == 'user')
                                        <li>
                                            <a href="{{ route('admin.user-commission-rates.index', $user->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rencana Komisi</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                onclick="return confirm('Are you sure want to delete?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4">
                                <img class="w-32 h-32 mx-auto"
                                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                    alt="image empty states">
                                <p class="text-gray-700 font-medium text-lg text-center">Datamu masih kosong sepertinya...
                                </p>
                                <p class="text-gray-500 text-center">Kamu bisa menambah datamu dengan mudah!</p>
                            </th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav class="space-y-3 md:space-y-0 p-4">
            {{ $users->links() }}
        </nav>
    </div>
@endsection
