<header>
    <nav class="fixed z-30 w-full bg-white border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 py-3 px-4">
        <div class="flex justify-between items-center max-w-screen-2xl mx-auto">
            <div class="flex justify-start items-center">
                <a href="/" class="flex mr-14">
                    <img class="h-[50px]" src="{{ asset('assets/images/logo_full.png') }}" alt="">

                </a>

                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                        <li class="mr-2">
                            <a href="{{route('user.dashboard')}}"
                                class="inline-flex items-center justify-center p-4 text-primary  hover:border-blue-600 rounded-t-lg "
                                aria-current="page">
                                <i class="fa-solid fa-chart-simple mr-2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{route('user.customers.index')}}"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-blue-600 dark:hover:text-gray-300 group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z" />
                                </svg>Sales
                            </a>
                        </li>
                        <li class="mr-2">
                            <a href="{{route('user.customers.index')}}"
                                class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                                <svg class="w-4 h-4 mr-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 20">
                                    <path
                                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                </svg>Customers
                            </a>
                        </li>
                        <li>
                            <a
                                class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Disabled</a>
                        </li>
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

                <div id="tooltip-toggle" role="tooltip"
                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(1282.4px, 60px, 0px);"
                    data-popper-placement="bottom">
                    Control Panel
                    <div class="tooltip-arrow" data-popper-arrow=""
                        style="position: absolute; left: 0px; transform: translate3d(68.8px, 0px, 0px);"></div>
                </div>

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
                        <a href="#"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-user fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">Profil</div>
                        </a>
                        <a href="#"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-building fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">Perusahaan</div>
                        </a>
                        <a href="#"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-users fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">Pengguna</div>
                        </a>
                        <a href="#"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-info fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">FAQ</div>
                        </a>
                        <a href="#"
                            class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <i class="fa-solid fa-right-from-bracket fa-2x text-gray-400 mb-1"></i>
                            <div class="text-sm text-gray-900 dark:text-white">Keluar</div>
                        </a>
                    </div>
                </div>
                <button type="button" id="toggleMobileMenuButton" data-collapse-toggle="toggleMobileMenu"
                    class="items-center p-2 text-gray-500 rounded-lg md:ml-2 lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">Open menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>


            </div>
        </div>
    </nav>
    <nav class="bg-white dark:bg-gray-900">

        <ul id="toggleMobileMenu" class="hidden flex-col mt-0 pt-16 w-full text-sm font-medium lg:hidden">
            <li class="block border-b dark:border-gray-700">
                <a href="#"
                    class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0"
                    aria-current="page">Home</a>
            </li>
            <li class="block border-b dark:border-gray-700">
                <a href="#"
                    class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Messages</a>
            </li>
            <li class="block border-b dark:border-gray-700">
                <a href="#"
                    class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Profile</a>
            </li>
            <li class="block border-b dark:border-gray-700">
                <a href="#"
                    class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Settings</a>
            </li>
            <li class="block border-b dark:border-gray-700">
                <button type="button" data-collapse-toggle="dropdownMobileNavbar"
                    class="flex justify-between items-center py-3 px-4 w-full text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Dropdown
                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg></button>
                <ul id="dropdownMobileNavbar" class="hidden">
                    <li class="block border-t border-b dark:border-gray-700">
                        <a href="#"
                            class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Item
                            1</a>
                    </li>
                    <li class="block border-b dark:border-gray-700">
                        <a href="#"
                            class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Item
                            2</a>
                    </li>
                    <li class="block">
                        <a href="#"
                            class="block py-3 px-4 text-gray-900 lg:py-0 dark:text-white lg:hover:underline lg:px-0">Item
                            3</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
