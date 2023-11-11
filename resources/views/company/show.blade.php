@extends('layouts.admin.index')
@section('title', 'Info Perusahaan')
@section('content')
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="py-5 px-4 lg:py-5">
            <form action="{{ route('company.update') }}" method="post">
                @method('PUT')
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div>
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-input"
                            value="{{ $company->name }}" {{ auth()->user()->is_admin ? 'required' : 'readonly' }}>
                    </div>
                    <div>
                        <label for="name" class="form-label">Nama Singkatan</label>
                        <input type="text" name="name" id="name" class="form-input"
                            value="{{ $company->abbreviation }}" {{ auth()->user()->is_admin ? 'required' : 'readonly' }}>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-input"
                            value="{{ $company->email }}" {{ auth()->user()->is_admin ? 'required' : 'readonly' }}>
                    </div>
                    <div>
                        <label for="phone_number" class="form-label">No. Kontak</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-input"
                            value="{{ $company->contact }}" {{ auth()->user()->is_admin ? 'required' : 'readonly' }}>
                    </div>
                    <div class="col-span-2">
                        <label for="company_about" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="company_about" id="company_about" cols="30" rows="4" class="form-input"
                            placeholder="" {{ auth()->user()->is_admin ? '' : 'readonly' }}>{{ $company->address }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="company_about" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tentang
                            Perusahaan</label>
                        <textarea name="company_about" id="company_about" cols="30" rows="4" class="form-input"
                            placeholder="Perusahaanku bergerak di bidang tambang..." {{ auth()->user()->is_admin ? '' : 'readonly' }}>{{ $company->about }}</textarea>
                    </div>

                </div>
                @role('admin')
                <div class="flex justify-between mt-5">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Simpan Data
                    </button>
                </div>
                @endrole
            </form>
        </div>
    </div>
@endsection
