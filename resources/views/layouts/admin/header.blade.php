@php
    $links = [
        'admin' => [
            [
                'route' => '',
                'icon' => '',
                'label' => '',
            ],
        ],
        'user' => [
            [
                'route' => route('user.sales.index'),
                'icon' => 'fa-solid fa-sack-dollar',
                'url' => 'user/sales*',
                'label' => 'Penjualan',
            ],
            [
                'route' => route('user.customers.index'),
                'icon' => 'fa-solid fa-user-tag',
                'url' => 'user/customers*',
                'label' => 'Pelanggan'
            ],
            [
                'route' => '#',
                'icon' => 'fa-solid fa-money-bill',
                'url' => 'user/customers',
                'label' => 'Histori Gaji'
            ],
        ],
    ];

    $controls = [];

    $links = $links[auth()->user()->role_name];

    $dashboard_url = auth()->user()->role_name . "/dashboard";
@endphp
<header>
    <nav class="fixed z-30 w-full bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-3 px-4">
        <div class="flex justify-between items-center max-w-screen-2xl mx-auto">
            <div class="flex justify-start items-center">
                <a href="/{{ $dashboard_url }}" class="flex mr-14">
                    <img class="h-[50px]" src="{{ asset('assets/images/logo_full.png') }}" alt="">
                </a>

                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="mr-2">
                            <a href="/{{$dashboard_url}}"
                                class="inline-flex items-center justify-center p-4 border-b-2 {{ Request::is($dashboard_url) ? 'border-primary text-primary border-b-2' : 'hover:text-gray-600 hover:border-gray-300'}} rounded-t-lg active"
                                aria-current="page">
                                <i class="fa-solid fa-chart-simple mr-2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        {{-- * ADMIN MENUS --}}
                        @role('admin')
                            <li class="mr-2">
                                <a href="#"
                                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                    <i class="fa-solid fa-sack-dollar mr-2"></i>
                                    <span>Penjualan</span>
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#"
                                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                    <i class="fa-solid fa-hand-holding-dollar mr-2"></i>
                                    <span>Penggajian</span>
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href=""
                                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                    <i class="fa-solid fa-book-bookmark mr-2"></i>
                                    <span>Pembukuan</span>
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#"
                                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                    <i class="fa-solid fa-users mr-2"></i>
                                    <span>Tim</span>
                                </a>
                            </li>
                            <li class="mr-2">
                                <a href="#"
                                    class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                    <i class="fa-solid fa-percent mr-2"></i>
                                    <span>Komisi</span>
                                </a>
                            </li>
                        @endrole
                        @foreach ($links as $link)
                        @php
                            $url = $link['url']
                        @endphp
                        <li class="mr-2">
                            <a href="{{ $link['route'] }}"
                                class="inline-flex items-center justify-center p-4 rounded-t-lg group {{ Request::is($url) ? ' border-b-2 border-primary text-primary' : 'hover:text-gray-600 hover:border-gray-300'}}">
                                <i class="{{ $link['icon'] }} mr-2"></i>
                                <span>{{ $link['label'] }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex justify-between items-center lg:order-2">
                <div class="mr-3 -mb-1 hidden sm:block">
                    <span></span>
                </div>
                <button type="button" data-dropdown-toggle="apps-dropdown" data-tooltip-target="tooltip-toggle"
                    class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100">
                    <i class="fa-solid fa-sliders mr-2"></i>
                    <span>Control Panel</span>
                </button>

                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600"
                    id="apps-dropdown"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(1394.4px, 62.4px, 0px);"
                    data-popper-placement="bottom">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50">
                        <p class="text-sm text-gray-900 dark:text-white" role="none">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                            {{ auth()->user()->role_name }}
                        </p>
                    </div>
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <a href="{{ route("user.profile") }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-user-tie fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">Profil</div>
                        </a>
                        <a href="{{ route('company.detail') }}"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-building fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">Perusahaan</div>
                        </a>
                        @role(['admin', 'finance', 'manager'])
                            <a href="#"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <i class="fa-solid fa-user-tag fa-2x text-gray-400 mb-1"></i>
                                <div class="text-sm text-gray-900 dark:text-white">Pelanggan</div>
                            </a>
                            <a href="{{ route('admin.users.index') }}"
                                class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <i class="fa-solid fa-people-group fa-2x text-gray-400 mb-1"></i>
                                <div class="text-sm text-gray-900 dark:text-white">Pengguna</div>
                            </a>
                        @endrole
                        <a href="/logout"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray- 600 group">
                            <i class="fa-solid fa-right-from-bracket fa-2x text-error mb-1"></i>
                            <div class="text-sm text-error dark:text-white">Keluar</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
