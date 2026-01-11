<x-master-layout title="Daftar Dokter">
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Manajemen Dokter</p>
                    <h1 class="text-3xl font-bold text-sky-900">Daftar Dokter</h1>
                    <p class="text-slate-600">Kelola data dan informasi dokter.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    @can('create_dokter')
                        <a href="{{ route('dokter.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Dokter
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="mb-6 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-sm">
            {{ $message }}
        </div>
    @endif

    <div class="mb-6 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <form method="GET" action="{{ route('dokter.index') }}" class="flex w-full flex-col gap-3 md:w-auto md:flex-row md:items-center">
            <div class="flex w-full items-center overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm md:w-80">
                <label for="search-dokter" class="sr-only">Cari dokter</label>
                <div class="flex items-center pl-3 text-slate-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input id="search-dokter" type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama, spesialisasi, lisensi" class="w-full border-0 bg-white px-3 py-3 text-sm text-slate-700 placeholder-slate-400 focus:ring-0" />
                <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-sky-500 to-teal-500 px-4 py-3 text-sm font-semibold text-white transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                    Cari
                </button>
            </div>
            @if (request('q'))
                <a href="{{ route('dokter.index') }}" class="text-sm font-semibold text-sky-700 hover:text-sky-900">Reset</a>
            @endif
        </form>
    </div>

    <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
        <div class="flex items-center justify-between border-b border-sky-100 px-6 py-4">
            <div>
                <h2 class="text-lg font-semibold text-sky-900">Daftar Dokter Terdaftar</h2>
                <p class="text-sm text-slate-500">Pantau data dokter aktif beserta kontak mereka.</p>
            </div>
            @if($dokters->count())
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">{{ $dokters->total() }} data</span>
            @endif
        </div>

        @if ($dokters->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-sky-50/80 text-sky-800">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Nama</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Spesialisasi</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">No. Lisensi</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Telepon</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Email</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($dokters as $dokter)
                            <tr class="transition hover:bg-sky-50/60">
                                <td class="px-6 py-4 text-sm font-semibold text-sky-900">
                                    {{ $dokter->nama }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-teal-50 px-3 py-1 text-teal-700 ring-1 ring-teal-100">
                                        <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                                        {{ $dokter->spesialisasi }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <span class="rounded-lg bg-sky-50 px-3 py-1 font-mono text-xs text-sky-700 ring-1 ring-sky-100">{{ $dokter->nomor_lisensi }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $dokter->no_telepon }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $dokter->email ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-wrap items-center gap-2">
                                        @can('view_dokter')
                                            <a href="{{ route('dokter.show', $dokter->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-sky-50 px-3 py-2 font-semibold text-sky-700 ring-1 ring-sky-100 transition hover:bg-sky-100">Lihat</a>
                                        @endcan
                                        @can('update_dokter')
                                            <a href="{{ route('dokter.edit', $dokter->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-emerald-50 px-3 py-2 font-semibold text-emerald-700 ring-1 ring-emerald-100 transition hover:bg-emerald-100">Edit</a>
                                        @endcan
                                        @can('delete_dokter')
                                            <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-1 rounded-lg bg-rose-50 px-3 py-2 font-semibold text-rose-700 ring-1 ring-rose-100 transition hover:bg-rose-100">Hapus</button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="border-t border-sky-100 px-6 py-4">
                {{ $dokters->links() }}
            </div>
        @else
            <div class="flex flex-col items-center gap-3 px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-100 to-teal-100 text-sky-600 shadow-inner">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-sky-900">Tidak ada data dokter</p>
                <p class="max-w-md text-sm text-slate-600">Mulai menambahkan dokter baru untuk mengisi daftar praktisi.</p>
                @can('create_dokter')
                    <a href="{{ route('dokter.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Dokter Pertama
                    </a>
                @endcan
            </div>
        @endif
    </div>
</x-master-layout>
