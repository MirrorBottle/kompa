<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route("dashboard") }}"
                    class="flex items-center p-2 rounded-lg group {{ Request::is('dashboard*') ? 'bg-secondary text-white' : 'text-gray-900 hover:bg-gray-100' }}">
                    <div class="w-8 text-center">
                        <i class="fa-solid fa-border-all text-2xl text-{{ Request::is('dashboard*') ? 'white' : 'secondary'}}"></i>
                    </div>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route("users.index") }}"
                    class="flex items-center p-2 rounded-lg group {{ Request::is('users*') ? 'bg-secondary text-white' : 'text-gray-900 hover:bg-gray-100' }}">
                    <div class="w-8 text-center">
                        <i class="fa-solid fa-users text-2xl text-{{ Request::is('users*') ? 'white' : 'secondary'}}"></i>
                    </div>
                    <span class="ml-4">Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{ route("departments.index") }}"
                    class="flex items-center p-2 rounded-lg group {{ Request::is('departments*') ? 'bg-secondary text-white' : 'text-gray-900 hover:bg-gray-100' }}">
                    <div class="w-8 text-center">
                        <i class="fa-solid fa-users-viewfinder text-2xl text-{{ Request::is('departments*') ? 'white' : 'secondary'}}"></i>
                    </div>
                    <span class="ml-4">Departemen</span>
                </a>
            </li>
            <li>
                <a href="{{ route("reports.index") }}"
                    class="flex items-center p-2 rounded-lg group {{ Request::is('reports*') ? 'bg-secondary text-white' : 'text-gray-900 hover:bg-gray-100' }}">
                    <div class="w-8 text-center">
                        <i class="fa-solid fa-file-lines text-2xl text-{{ Request::is('reports*') ? 'white' : 'secondary'}}"></i>
                    </div>
                    <span class="ml-4">HIRAC</span>
                </a>
            </li>
            <li>
                <a href="{{ route("teams.index") }}"
                    class="flex items-center p-2 rounded-lg group {{ Request::is('teams*') ? 'bg-secondary text-white' : 'text-gray-900 hover:bg-gray-100' }}">
                    <div class="w-8 text-center">
                        <i class="fa-solid fa-helmet-safety text-2xl text-{{ Request::is('teams*') ? 'white' : 'secondary'}}"></i>
                    </div>
                    <span class="ml-4">Tim K3L</span>
                </a>
            </li>
            <li>
                <a href="{{ route("evaluations.index") }}"
                    class="flex items-center p-2 rounded-lg group {{ Request::is('evaluations*') ? 'bg-secondary text-white' : 'text-gray-900 hover:bg-gray-100' }}">
                    <div class="w-8 text-center">
                        <i class="fa-solid fa-calendar-day text-2xl text-{{ Request::is('evaluations*') ? 'white' : 'secondary'}}"></i>
                    </div>
                    <span class="ml-4">Evaluasi</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
