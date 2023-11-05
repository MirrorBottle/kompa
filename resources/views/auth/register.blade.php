@extends('layouts.auth.index', ['without_image' => true])
@section('title', 'Register')
@section('content')
    <h1 class="text-xl font-bold leading-tight tracking-tight text-secondary md:text-2xl dark:text-white">
        Daftarkan Kamu dan Perusahaanmu
    </h1>
    <form class="space-y-6" action="{{ route('register') }}" method="post">
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-6 group space-y-6">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Namamu</label>
                    <input type="text" name="name" id="name" class="form-input" placeholder="Namamu" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="form-input"
                        placeholder="namamu@perusahaan.com" required>
                </div>
                <div>
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="form-input"
                        required>
                </div>
                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        HP</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="+623890128391"
                        class="form-input" required>
                </div>
            </div>
            <div class="relative z-0 w-full mb-6 group space-y-6">
                <div>
                    <label for="company_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Perusahaan</label>
                    <input type="text" name="company_name" id="company_name" class="form-input"
                        placeolder="Perusahaanku" required>
                </div>
                <div>
                    <label for="company_address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" name="company_address" id="company_address" class="form-input"
                        placeholder="Jl. Sukses No. 4" required>
                </div>
                <div>
                    <label for="company_about" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tentang
                        Perusahaan</label>
                    <textarea name="company_about" id="company_about" cols="30" rows="4" class="form-input"
                        placeholder="Perusahaanku bergerak di bidang tambang..."></textarea>
                </div>
            </div>
        </div>


        <button type="submit"
            class="w-full text-white bg-secondary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Sudah punya akun? <a href="/register"
                class="font-medium text-secondary hover:underline dark:text-secondary-500">Masuk Di sini</a>
        </p>
    </form>
@endsection
