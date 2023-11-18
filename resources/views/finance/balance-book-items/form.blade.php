@csrf
<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <input type="hidden" name="balance_book_id" id="balance_book_id" value="{{ $book->id }}">
    <div>
        <label  class="form-label">Nama Pembukuan</label>
        <input type="text" name="" id="sale_date" class="form-input" value="{{ $book->name }}" disabled>
    </div>
    <div>
        <label class="form-label">Nama Pengeluaran</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ isset($data) ? $data->name : '' }}" required>
    </div>
    <div>
        <label  class="form-label">Total</label>
        <input type="number" name="amount" id="amount" class="form-input" value="{{ isset($data) ? $data->amount : '' }}" required>
    </div>
    <div>
        <label for="type" class="form-label">Tipe</label>
        <select id="type" required
            name="type"
            class="form-input select2">
            <option {{ isset($data) ? ($data->type == '1' ? 'selected' : '') : '' }} value="4">Penggajian</option>
            <option {{ isset($data) ? ($data->type == '2' ? 'selected' : '') : '' }} value="3">Komisi</option>
            <option {{ isset($data) ? ($data->type == '4' ? 'selected' : '') : '' }} value="3">Pengeluaran Lainnya</option>
        </select>
    </div>

</div>
<div class="flex justify-end mt-5">
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Simpan Data
    </button>
</div>

