<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $attributes->get('title') ?? 'Sistem Rekam Medis' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-sky-50 via-white to-slate-50 text-slate-800">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation Header -->
        <nav class="relative z-30 flex h-16 items-center border-b border-sky-100 bg-white/90 px-4 shadow-sm backdrop-blur">
            <div class="absolute inset-x-0 -bottom-px h-px bg-gradient-to-r from-sky-200 via-teal-200 to-sky-200"></div>

            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-sky-500 to-teal-500 text-white shadow-md">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-sky-900">Rekam Medis</span>
                </a>
            </div>

            <div class="flex-1"></div>

            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex items-center space-x-3 ml-4">
                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-sky-500 to-teal-500 text-white flex items-center justify-center shadow-inner">
                        <span class="text-sm font-semibold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                    </div>
                    <span class="text-sm font-semibold text-sky-900">{{ auth()->user()->name }}</span>
                    <div class="h-2 w-2 rounded-full bg-emerald-400"></div>
                </div>

                <div class="relative group">
                    <button class="flex items-center space-x-2 rounded-lg px-3 py-2 text-slate-700 transition hover:bg-sky-50 hover:text-sky-900 focus:outline-none">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <div class="absolute right-0 mt-0 w-52 divide-y divide-slate-100 rounded-xl border border-slate-100 bg-white text-slate-700 shadow-xl ring-1 ring-sky-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-40">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm transition hover:bg-sky-50">
                            <div class="font-semibold text-sky-900">Profil</div>
                            <div class="text-xs text-slate-500">Kelola profil Anda</div>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-3 text-sm font-semibold text-rose-600 transition hover:bg-rose-50">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


        <div class="flex flex-1">
            <!-- Sidebar Navigation -->
            <aside class="relative w-64 bg-gradient-to-b from-sky-900 via-sky-800 to-sky-900 text-white shadow-xl">
                <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-sky-300 via-teal-200 to-sky-300 opacity-60"></div>
                <nav class="mt-8 space-y-2 px-4 pb-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-white/15 ring-1 ring-white/20 shadow-md' : 'hover:bg-white/10' }} transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4l4 2m-8-2l4-2"></path>
                        </svg>
                        <span class="font-semibold">Dashboard</span>
                    </a>

                    @role('user')
                        <a href="{{ route('pasien.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('pasien.*') ? 'bg-white/15 ring-1 ring-white/20 shadow-md' : 'hover:bg-white/10' }} transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.646 4 4 0 010-8.646M9 9H3v10a1 1 0 001 1h16a1 1 0 001-1V9h-6m0 0H9m6 0a1 1 0 00-1 1v3m0 0a1 1 0 001 1h2a1 1 0 001-1v-3a1 1 0 00-1-1h-2a1 1 0 00-1 1zm0 0V9m-6 0a1 1 0 011-1h2a1 1 0 011 1v3a1 1 0 01-1 1H9a1 1 0 01-1-1v-3a1 1 0 011-1zm0 0V9"></path>
                            </svg>
                            <span class="font-semibold">Pasien</span>
                        </a>
                    @endrole

                    @role('user')
                        <a href="{{ route('dokter.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('dokter.*') ? 'bg-white/15 ring-1 ring-white/20 shadow-md' : 'hover:bg-white/10' }} transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">Dokter</span>
                        </a>
                    @endrole

                    @role('user')
                        <a href="{{ route('obat.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('obat.*') ? 'bg-white/15 ring-1 ring-white/20 shadow-md' : 'hover:bg-white/10' }} transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">Obat</span>
                        </a>
                    @endrole

                    @role('user')
                        <a href="{{ route('rekam-medis.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('rekam-medis.*') ? 'bg-white/15 ring-1 ring-white/20 shadow-md' : 'hover:bg-white/10' }} transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="font-semibold">Rekam Medis</span>
                        </a>
                    @endrole

                    @if(auth()->user() && auth()->user()->hasRole('superadmin'))
                        <div class="my-4 h-px bg-white/10"></div>
                        <a href="{{ route('users.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('users.*') ? 'bg-white/15 ring-1 ring-white/20 shadow-md' : 'hover:bg-white/10' }} transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20h12v-2a9 9 0 00-18 0v2z"></path>
                            </svg>
                            <span class="font-semibold">Kelola User</span>
                        </a>
                    @endif
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 overflow-auto">
                <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                    <!-- Alerts -->
                    @if ($errors->any())
                        <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 shadow-sm">
                            <h3 class="mb-2 text-sm font-semibold text-rose-800">Terjadi Kesalahan</h3>
                            <ul class="list-disc list-inside space-y-1 text-sm text-rose-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-4 flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 shadow-sm">
                            <span>{{ session('success') }}</span>
                            <button onclick="this.parentElement.style.display='none'" class="text-emerald-700 hover:text-emerald-900">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 flex items-center justify-between rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800 shadow-sm">
                            <span>{{ session('error') }}</span>
                            <button onclick="this.parentElement.style.display='none'" class="text-rose-700 hover:text-rose-900">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    <!-- Content -->
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
