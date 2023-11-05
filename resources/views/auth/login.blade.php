@extends('layouts.auth.index')
@section('title', 'Login')
@section('content')
    <h1 class="text-xl font-bold leading-tight tracking-tight text-secondary md:text-2xl dark:text-white">
        Masuk ke akun Kompa-mu
    </h1>
    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5 dark:bg-gray dark:border-gray dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="namamu@perusahaan.com" required>
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5 dark:bg-gray dark:border-gray dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                required>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" name="remember" aria-describedby="remember" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                </div>
            </div>
        </div>
        <button type="submit"
            class="w-full text-white bg-secondary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Belum punya akun? <a href="/register"
                class="font-medium text-secondary hover:underline dark:text-secondary-500">Daftar Di sini</a>
        </p>
    </form>
@endsection
