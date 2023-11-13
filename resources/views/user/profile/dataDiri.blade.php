<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="dataDiri" role="tabpanel" aria-labelledby="dataDiri-tab">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
        <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
        <div>
            <label  class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-input" disabled value="{{ auth()->user()->name}}">
        </div>
        <div>
            <label  class="form-label">Hak Akses</label>
            <input type="text" name="abbreviation" id="abbreviation" class="form-input" disabled value="{{ auth()->user()->role_name}}">
        </div>

        <div>
            <label  class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-input" disabled value="{{ auth()->user()->email}}">
        </div>
        <div>
            <label  class="form-label">Nomor HP</label>
            <input type="text" name="phone_number" id="phone_number" class="form-input" disabled value="{{ auth()->user()->phone_number}}">
        </div>
        <div>
            <label  class="form-label">Nama Tim</label>
            <input type="text" name="phone_number" id="phone_number" class="form-input" disabled value="">
        </div>
        <div>
            <label  class="form-label">Anggota Tim</label>
            <div class="space-y-1 w-1/2">
                <input type="text" name="phone_number" id="phone_number" class="form-input" disabled value="">
                <input type="text" name="phone_number" id="phone_number" class="form-input" disabled value="">
                <input type="text" name="phone_number" id="phone_number" class="form-input" disabled value="">
            </div>



        </div>

    </div>


</div>
