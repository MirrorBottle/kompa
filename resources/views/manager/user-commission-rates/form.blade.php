@csrf
<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
    <div>
        <label for="name" class="form-label">Komisi Sekarang</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ $user->commission->name }}" readonly disabled>
    </div>
    <div>
        <label  class="form-label">Komisi Baru</label>
        <select type="text" name="commission_rate_id" id= 'commission_rate_id' class="w-full form-input select2" >
            @foreach ($rates as $rate)
                <option value="{{$rate->id}}">{{$rate->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="flex justify-between mt-5">
    <a class="btn-secondary" href="{{ route('manager.user-commission-rates.index', $user->id) }}">
        <i class="fa-solid fa-chevron-left mr-2"></i>
        Kembali
    </a>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Simpan Data
    </button>
</div>
