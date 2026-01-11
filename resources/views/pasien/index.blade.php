<x-master-layout title="Daftar Pasien">
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Pasien</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="text-3xl font-bold text-sky-900">Daftar Pasien</h1>
                        @if ($pasiens->total())
                            <span class="rounded-full bg-white/80 px-3 py-1 text-xs font-semibold text-sky-700 shadow-sm ring-1 ring-sky-100">{{ $pasiens->total() }} data</span>
                        @endif
                    </div>
                    <p class="text-slate-600">Kelola data pasien.</p>
                </div>

                <div class="flex w-full flex-col gap-3 md:w-auto md:flex-row md:items-center">
                    <form method="GET" action="{{ route('pasien.index') }}" class="w-full md:w-96">
                        <label for="search-pasien" class="sr-only">Cari pasien</label>
                        <div class="group flex items-center rounded-xl border border-sky-100 bg-white/90 shadow-sm ring-1 ring-transparent focus-within:ring-2 focus-within:ring-sky-300">
                            <div class="px-3 text-sky-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"></path>
                                </svg>
                            </div>
                            <input id="search-pasien" type="search" name="q" value="{{ request('q') }}" placeholder="Cari nama, identitas, email" class="w-full border-0 bg-transparent px-1 py-3 text-sm text-slate-700 placeholder-slate-400 focus:ring-0" />
                            <button type="submit" class="mr-2 rounded-lg bg-gradient-to-r from-sky-500 to-teal-500 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:shadow-md focus:outline-none focus:ring-2 focus:ring-sky-300">Cari</button>
                        </div>
                    </form>

                    <div class="flex items-center gap-3">
                        @if (request('q'))
                            <a href="{{ route('pasien.index') }}" class="text-sm font-medium text-sky-700 hover:text-sky-900">Reset</a>
                        @endif
                        @can('create_pasien')
                            <a href="{{ route('pasien.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-4 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Pasien
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="mb-4 flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800 shadow-sm">
            <p>{{ $message }}</p>
            <span class="rounded-full bg-white/70 px-3 py-1 text-xs font-semibold text-emerald-700">Sukses</span>
        </div>
    @endif

    <div class="rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
        <div class="flex flex-col gap-2 border-b border-sky-100 px-6 py-5 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-sky-900">Pasien Terdaftar</h2>
                <p class="text-sm text-slate-500">Data pasien dengan identitas, kontak, dan gender.</p>
            </div>
            @if($pasiens->count())
                <span class="rounded-lg bg-sky-50 px-3 py-2 text-xs font-semibold uppercase tracking-wide text-sky-700">Terbaru</span>
            @endif
        </div>

        @if ($pasiens->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-sky-50/80 text-sky-800">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Nama</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">No. Identitas</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Telepon</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Email</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Jenis Kelamin</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($pasiens as $pasien)
                            <tr class="transition hover:bg-sky-50/60">
                                <td class="px-6 py-4 text-sm font-semibold text-sky-900">
                                    <div>{{ $pasien->nama }}</div>
                                    <p class="text-xs text-slate-500">ID: {{ $pasien->id }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $pasien->nomor_identitas }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $pasien->no_telepon }}</td>
                                <td class="px-6 py-4 text-sm text-slate-700">{{ $pasien->email ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'bg-sky-50 text-sky-700 ring-1 ring-sky-100' : 'bg-teal-50 text-teal-700 ring-1 ring-teal-100' }}">
                                        <span class="h-2 w-2 rounded-full {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'bg-sky-500' : 'bg-teal-500' }}"></span>
                                        {{ $pasien->jenis_kelamin ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-wrap gap-2">
                                        @can('view_pasien')
                                            <a href="{{ route('pasien.show', $pasien->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-sky-50 px-3 py-2 font-semibold text-sky-700 ring-1 ring-sky-100 transition hover:bg-sky-100">Lihat</a>
                                        @endcan
                                        @can('update_pasien')
                                            <a href="{{ route('pasien.edit', $pasien->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-teal-50 px-3 py-2 font-semibold text-teal-700 ring-1 ring-teal-100 transition hover:bg-teal-100">Edit</a>
                                        @endcan
                                        @can('delete_pasien')
                                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="inline" onclick="return confirm('Apakah Anda yakin?')">
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
                {{ $pasiens->links() }}
            </div>
        @else
            <div class="flex flex-col items-center gap-3 px-6 py-16 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-100 to-teal-100 text-sky-600 shadow-inner">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.646 4 4 0 010-8.646M9 9H3v10a1 1 0 001 1h16a1 1 0 001-1V9h-6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-sky-900">Tidak ada data pasien</h3>
                <p class="max-w-md text-sm text-slate-600">Mulai tambah pasien baru untuk mengelola riwayat kunjungan secara terstruktur.</p>
                @can('create_pasien')
                    <div class="mt-2">
                        <a href="{{ route('pasien.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Pasien
                        </a>
                    </div>
                @endcan
            </div>
        @endif
    </div>
</x-master-layout>
       