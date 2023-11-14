@csrf
<div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
    <input type="hidden" name="company_id" id="company_id" value="{{ auth()->user()->company_id }}">
    <div>
        <label for="name" class="form-label">Nama Tim</label>
        <input type="text" name="name" id="name" class="form-input"
            value="{{ isset($data) ? $data->name : '' }}" required>
    </div>
    <div>
        <label for="email" class="form-label">Manager</label>
        <select type="text" name="manager_id" id="manager_id" class="w-full select2 form-input">

            @isset($data)
            <option selected value="{{ $data->manager->id }}">{{ $data->manager->name }}</option>
            @endisset
            @foreach ($managers as $manager)
                <option {{ isset($data) ? ($data->manager->id == $manager->id ? 'selected' : '') : '' }}
                    value="{{ $manager->id }}">{{ $manager->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-span-2">
        <label for="company_about" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggota</label>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4"></th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. HP
                    </th>
                </tr>
            </thead>
            <tbody>
                @isset($data)
                    @php
                        $members = $members->merge($data->users);
                    @endphp
                @endisset
                @foreach ($members as $member)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    name="member_ids[]"
                                    value="{{ $member->id }}"
                                    {{ isset($data) && in_array($member->id, $data->users->pluck("id")->toArray()) ? 'checked' : '' }}
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $member->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $member->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $member->phone_number }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="flex justify-between mt-5">
    <a class="btn-secondary" href="{{ route('admin.users.index') }}">
        <i class="fa-solid fa-chevron-left mr-2"></i>
        Kembali
    </a>
    <button type="submit"
        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        Simpan Data
    </button>
</div>
