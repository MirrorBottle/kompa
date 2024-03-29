@csrf
<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
    <div>
        <label  class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ isset($data) ? $data->name : '' }}" required>
    </div>
    <div>
        <label  class="form-label">Singkatan</label>
        <input type="text" name="abbreviation" id="abbreviation" class="form-input" value="{{ isset($data) ? $data->abbreviation : '' }}" required>
    </div>
    <div>
        <label  class="form-label">Nomor HP</label>
        <input type="text" name="phone_number" id="phone_number" class="form-input" value="{{ isset($data) ? $data->phone_number : '' }}" required>
    </div>
    <div>
        <label  class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ isset($data) ? $data->email : '' }}" required>
    </div>
    <div>
        <label for="code" class="form-label">Alamat</label>
        <input type="text" name="address" id="address" class="form-input" value="{{ isset($data) ? $data->address : '' }}" required>
    </div>
</div>
<div class="flex justify-between mt-5">
    <a class="btn-secondary" href="{{ route('user.customers.index')}}">
        <i class="fa-solid fa-chevron-left mr-2"></i>
        Kembali
    </a>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Simpan Data
    </button>
</div>
