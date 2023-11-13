<div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="team" role="tabpanel"
    aria-labelledby="team-tab">

    @if (auth()->user()->team)
        @php
            $team = auth()->user()->team;
        @endphp
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption
                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                {{ $team->name }}
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. HP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jabatan
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team->members as $member)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $member->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $member->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $member->phone_number }}
                        </td>
                        <td class="px-6 py-4">
                            {!! $member->role_name_badge !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <img class="w-32 h-32 mx-auto"
            src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
            alt="image empty states">
        <p class="text-gray-700 font-medium text-lg text-center">Datamu masih kosong sepertinya...
        </p>
        <p class="text-gray-500 text-center">Kamu bisa menambah datamu dengan mudah!</p>
    @endif
</div>
