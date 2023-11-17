<div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800" id="changepw" role="tabpanel" aria-labelledby="changepw-tab">
    <form action="{{ route('user.changePass') }}" method="post">
        @csrf
        <div class="mb-6">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
            <input type="text" id="oldPass" name="oldPass" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
            <input type="password" id="newPass" name="newPass" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
            <input type="password" id="confirmPass" name="confirmPass" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="flex justify-end mt-5">
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
                <i class="fa-solid fa-floppy-disk mr-2"></i>
                Simpan Data
            </button>
        </div>
    </form>

</div>
