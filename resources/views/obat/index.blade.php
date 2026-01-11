<x-master-layout title="Daftar Obat">
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Manajemen Obat</p>
                    <h1 class="text-3xl font-bold text-sky-900">Daftar Obat</h1>
                    <p class="text-slate-600">Kelola data obat di sistem rekam.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    @can('create_obat')
                        <a href="{{ route('obat.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Obat
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
        <form method="GET" action="{{ route('obat.index') }}" class="flex w-full flex-col gap-3 md:w-auto md:flex-row md:items-center">
            <div class="flex w-full items-center overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm md:w-80">
                <label for="search-obat" class="sr-only">Cari obat</label>
                <div class="flex items-center pl-3 text-slate-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input id="search-obat" type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama, dosis, kategori" class="w-full border-0 bg-white px-3 py-3 text-sm text-slate-700 placeholder-slate-400 focus:ring-0" />
                <button type="submit" class="flex items-center gap-2 bg-gradient-to-r from-sky-500 to-teal-500 px-4 py-3 text-sm font-semibold text-white transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                    Cari
                </button>
            </div>
            @if (request('q'))
                <a href="{{ route('obat.index') }}" class="text-sm font-semibold text-sky-700 hover:text-sky-900">Reset</a>
            @endif
        </form>
    </div>

    <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
        <div class="flex items-center justify-between border-b border-sky-100 px-6 py-4">
            <div>
                <h2 class="text-lg font-semibold text-sky-900">Daftar Obat Tersedia</h2>
                <p class="text-sm text-slate-500">Pantau stok obat, harga, dan kategori.</p>
            </div>
            @if($obats->count())
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">{{ $obats->total() }} data</span>
            @endif
        </div>

        @if ($obats->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-sky-50/80 text-sky-800">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Nama Obat</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Dosis</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Kategori</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Harga</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Stok</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($obats as $obat)
                            <tr class="transition hover:bg-sky-50/60">
                                <td class="px-6 py-4 text-sm font-semibold text-sky-900">
                                    {{ $obat->nama }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    {{ $obat->dosis }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700 ring-1 ring-teal-100">{{ $obat->kategori ?? '-' }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    Rp {{ number_format($obat->harga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @php
                                        $stokClass = $obat->stok > 10 ? 'bg-emerald-50 text-emerald-700 ring-emerald-100' : ($obat->stok > 0 ? 'bg-amber-50 text-amber-700 ring-amber-100' : 'bg-rose-50 text-rose-700 ring-rose-100');
                                    @endphp
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold ring-1 {{ $stokClass }}">
                                        <span class="h-2 w-2 rounded-full {{ $obat->stok > 10 ? 'bg-emerald-500' : ($obat->stok > 0 ? 'bg-amber-500' : 'bg-rose-500') }}"></span>
                                        {{ $obat->stok }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-wrap items-center gap-2">
                                        @can('view_obat')
                                            <a href="{{ route('obat.show', $obat->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-sky-50 px-3 py-2 font-semibold text-sky-700 ring-1 ring-sky-100 transition hover:bg-sky-100">Lihat</a>
                                        @endcan
                                        @can('update_obat')
                                            <a href="{{ route('obat.edit', $obat->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-emerald-50 px-3 py-2 font-semibold text-emerald-700 ring-1 ring-emerald-100 transition hover:bg-emerald-100">Edit</a>
                                        @endcan
                                        @can('delete_obat')
                                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin?')">
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
                {{ $obats->links() }}
            </div>
        @else
            <div class="flex flex-col items-center gap-3 px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-100 to-teal-100 text-sky-600 shadow-inner">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-sky-900">Tidak ada data obat</p>
                <p class="max-w-md text-sm text-slate-600">Mulai menambahkan obat untuk melengkapi daftar stok.</p>
                @can('create_obat')
                    <a href="{{ route('obat.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Obat Pertama
                    </a>
                @endcan
            </div>
        @endif
    </div>
</x-master-layout>
