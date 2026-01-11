<x-master-layout title="Daftar Rekam Medis">
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Rekam Medis</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <h1 class="text-3xl font-bold text-sky-900">Daftar Rekam Medis</h1>
                        @if ($rekamMedis->total())
                            <span class="rounded-full bg-white/80 px-3 py-1 text-xs font-semibold text-sky-700 shadow-sm ring-1 ring-sky-100">{{ $rekamMedis->total() }} data</span>
                        @endif
                    </div>
                    <p class="text-slate-600">Kelola data rekam medis.</p>
                </div>

                <div class="flex w-full flex-col gap-3 md:w-auto md:flex-row md:items-center">
                    <form method="GET" action="{{ route('rekam-medis.index') }}" class="w-full md:w-96">
                        <label for="search-rekam" class="sr-only">Cari rekam medis</label>
                        <div class="group flex items-center rounded-xl border border-sky-100 bg-white/90 shadow-sm ring-1 ring-transparent focus-within:ring-2 focus-within:ring-sky-300">
                            <div class="px-3 text-sky-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"></path>
                                </svg>
                            </div>
                            <input id="search-rekam" type="search" name="q" value="{{ request('q') }}" placeholder="Cari kode, pasien, dokter, diagnosa" class="w-full border-0 bg-transparent px-1 py-3 text-sm text-slate-700 placeholder-slate-400 focus:ring-0" />
                            <button type="submit" class="mr-2 rounded-lg bg-gradient-to-r from-sky-500 to-teal-500 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:shadow-md focus:outline-none focus:ring-2 focus:ring-sky-300">Cari</button>
                        </div>
                    </form>

                    <div class="flex items-center gap-3">
                        @if (request('q'))
                            <a href="{{ route('rekam-medis.index') }}" class="text-sm font-medium text-sky-700 hover:text-sky-900">Reset</a>
                        @endif
                        <a href="{{ route('rekam-medis.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-4 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Rekam Medis
                        </a>
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
                <h2 class="text-lg font-semibold text-sky-900">Rekam Medis Terdaftar</h2>
                <p class="text-sm text-slate-500">Pantau detail rekam medis pasien.</p>
            </div>
            @if($rekamMedis->count())
                <span class="rounded-lg bg-sky-50 px-3 py-2 text-xs font-semibold uppercase tracking-wide text-sky-700">Terbaru</span>
            @endif
        </div>

        @if ($rekamMedis->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-sky-50/80 text-sky-800">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Kode</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Pasien</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Dokter</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Tanggal Kunjungan</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Diagnosa</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Biaya</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($rekamMedis as $medis)
                            <tr class="transition hover:bg-sky-50/60">
                                <td class="px-6 py-4 text-sm font-semibold text-sky-900">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-sky-700 ring-1 ring-sky-100">
                                        <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                                        {{ $medis->kode }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <div class="font-semibold text-slate-900">{{ $medis->pasien->nama }}</div>
                                    <p class="text-xs text-slate-500">ID: {{ $medis->pasien_id }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <div class="font-semibold text-slate-900">{{ $medis->dokter->nama }}</div>
                                    <p class="text-xs text-slate-500">{{ $medis->dokter->spesialisasi }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <div class="font-semibold text-slate-900">{{ optional($medis->tanggal_kunjungan)->format('d M Y') ?? '-' }}</div>
                                    <p class="text-xs text-slate-500">{{ optional($medis->tanggal_kunjungan)->format('H:i') ?? 'Waktu tidak tersedia' }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <p class="line-clamp-2 text-slate-700">{{ $medis->diagnosa }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-sky-900">
                                    Rp {{ number_format($medis->biaya ?? 0, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('rekam-medis.show', $medis->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-sky-50 px-3 py-2 font-semibold text-sky-700 ring-1 ring-sky-100 transition hover:bg-sky-100">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat
                                        </a>
                                        <a href="{{ route('rekam-medis.edit', $medis->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-teal-50 px-3 py-2 font-semibold text-teal-700 ring-1 ring-teal-100 transition hover:bg-teal-100">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1 0v14m-7-7h14"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('rekam-medis.destroy', $medis->id) }}" class="inline" onsubmit="return confirm('Yakin hapus rekam medis ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center gap-1 rounded-lg bg-rose-50 px-3 py-2 font-semibold text-rose-700 ring-1 ring-rose-100 transition hover:bg-rose-100">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="border-t border-sky-100 px-6 py-4">
                {{ $rekamMedis->links() }}
            </div>
        @else
            <div class="flex flex-col items-center gap-3 px-6 py-16 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-100 to-teal-100 text-sky-600 shadow-inner">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-sky-900">Belum ada data rekam medis</h3>
                <p class="max-w-md text-sm text-slate-600">Mulai tambahkan rekam medis untuk memonitor riwayat kunjungan dan diagnosa pasien secara terstruktur.</p>
                @can('create_rekam_medis')
                    <div class="mt-2">
                        <a href="{{ route('rekam-medis.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Rekam Medis
                        </a>
                    </div>
                @endcan
            </div>
        @endif
    </div>
</x-master-layout>
