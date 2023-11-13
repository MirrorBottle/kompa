@csrf
<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="salary_id" id="salary_id" value={{null}}>
    <div>
        <label  class="form-label">Tanggal</label>
        <input type="date" name="sale_date" id="sale_date" class="form-input" value="{{ isset($data) ? $data->sale_date : '' }}" required>
    </div>
    <div>
        <label  class="form-label">Nama Pelanggan</label>
        <select type="text" name="customer_id" id= 'customer_id' class="w-full select2 form-input" >
            <option value="{{ isset($data) ? $data->customer_id : '' }}" disabled selected>{{isset($data) ? $data->customer->name : ""}} </option>
            @foreach ($customers as $csm)
                <option value="{{$csm->id}}">{{$csm->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label  class="form-label">Jumlah penjualan</label>
        <input type="text" name="sale_amount" id="sale_amount" class="form-input" value="{{ isset($data) ? $data->sale_amount : '' }}" required>
    </div>

</div>
<div class="flex justify-between mt-5">
    <a class="btn-secondary" href="{{ route('user.sales.index')}}">
        <i class="fa-solid fa-chevron-left mr-2"></i>
        Kembali
    </a>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Simpan Data
    </button>
</div>

