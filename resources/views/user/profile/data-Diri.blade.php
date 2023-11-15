<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="dataDiri" role="tabpanel" aria-labelledby="dataDiri-tab">
    <form action="{{ route('user.profile.update') }}" method="post">
        @method('PUT')
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
            <div>
                <label  class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-input bg-white" value="{{ auth()->user()->name}}">
            </div>
            <div>
                <label  class="form-label">Nomor HP</label>
                <input type="text" name="phone_number" id="phone_number" class="form-input bg-white" value="{{ auth()->user()->phone_number}}">
            </div>
            <div>
                <label  class="form-label">Hak Akses</label>
                <input type="text" name="abbreviation" id="abbreviation" class="form-input" disabled value="{{ auth()->user()->role_name}}">
            </div>
            <div>
                <label for="base_salary" class="form-label">Gaji Pokok (Rp. )</label>
                <input type="number" name="base_salary" id="base_salary" class="form-input" value="{{ auth()->user()->base_salary }}" disabled>
            </div>
            <div>
                <label  class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-input" disabled value="{{ auth()->user()->email}}">
            </div>
        </div>
    </form>
</div>
