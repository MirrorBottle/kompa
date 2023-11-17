<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="komisi" role="tabpanel" aria-labelledby="komisi-tab">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-4 py-3">Komisi</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Tgl. Invalid</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rates as $rate)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900">
                                {{ $rate->commission->name }}
                            </th>
                            <td class="px-4 py-3">
                                @if ($rate->is_invalid)
                                    <span
                                        class='bg-red-100 text-red-800 text-sm font-medium me-2 px-4 py-1 rounded'>Nonaktif</span>
                                @else
                                    <span
                                        class='bg-green-100 text-green-800 text-sm font-medium me-2 px-4 py-1 rounded'>Aktif</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                {{ $rate->is_invalid ? $rate->invalid_date->format('d/m/Y') : '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="4">
                                <img class="w-32 h-32 mx-auto"
                                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                    alt="image empty states">
                                <p class="text-gray-700 font-medium text-lg text-center">Datamu masih kosong sepertinya...
                                </p>
                                <p class="text-gray-500 text-center">Kamu bisa menambah datamu dengan mudah!</p>
                            </th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <nav class="space-y-3 md:space-y-0 p-4">
            {{ $rates->links() }}
        </nav>
    </div>
</div>
